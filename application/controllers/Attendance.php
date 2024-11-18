<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Attendance extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // is_weekends();
        is_logged_in();
        is_checked_in();
        is_checked_out();
        $this->load->library('form_validation');
        $this->load->model('Public_model');
        $this->load->model('Admin_model');
    }
    public function index()
    {
        $d['title'] = 'Attendance Form';
        $d['account'] = $this->Public_model->getAccount($this->session->userdata['username']);

        // Kiểm tra trạng thái từ session
        $checked_in = $this->session->userdata('checked_in') ?? false;
        $checked_out = $this->session->userdata('checked_out') ?? false;

        $d['in'] = $checked_in; // Trạng thái chấm công (Turn It)
        $d['disable'] = $checked_out; // Trạng thái vô hiệu hóa nút Checkout

        // Nếu chưa check-in
        if (!$checked_in) {
            $this->form_validation->set_rules('work_shift', 'Work Shift', 'required|trim');

            if ($this->form_validation->run() == false) {
                // Hiển thị form chấm công
                $this->load->view('templates/header', $d);
                $this->load->view('templates/sidebar');
                $this->load->view('templates/topbar');
                $this->load->view('attendance/index', $d);
            } else {
                // Xử lý chấm công (Check In)
                $this->_handleCheckIn($d);
            }
        } else {
            // Hiển thị form sau khi đã check-in hoặc check-out
            $this->load->view('templates/header', $d);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('attendance/index', $d);
        }
    }

    private function _handleCheckIn($d)
    {
        date_default_timezone_set('Asia/Jakarta');
        $username = $this->session->userdata('username');
        $shift = $d['account']['shift'];
        $notes = $this->input->post('notes');
        $shift_id = $this->input->post('work_shift');
        $iTime = time();

        $value = [
            'username' => $username,
            'employee_id' => $d['account']['id'],
            'department_id' => $d['account']['department_id'],
            'shift_id' => $shift_id,
            'in_time' => $iTime,
            'notes' => $notes,
        ];

        $this->_checkIn($value);
    }

    private function _checkIn($value)
    {
        $this->db->insert('attendance', $value);
        if ($this->db->affected_rows() > 0) {
            $this->session->set_userdata('checked_in', true); // Đánh dấu đã check-in
            $this->session->set_userdata('checked_out', false); // Reset trạng thái check-out
            $this->session->set_flashdata('message', '<div class="alert alert-success">Stamped attendance for today</div>');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger">Failed to stamp your attendance!</div>');
        }
        redirect('attendance');
    }

    public function checkOut()
    {
        $username = $this->session->userdata('username');
        $today = date('Y-m-d', time());
    
        // Lấy bản ghi gần nhất của ngày hôm nay
        $querySelect = "SELECT id FROM `attendance`
                        WHERE `username` = '$username' 
                          AND FROM_UNIXTIME(`in_time`, '%Y-%m-%d') = '$today'
                        ORDER BY `in_time` DESC LIMIT 1";
        $record = $this->db->query($querySelect)->row_array();
    
        if ($record) {
            $id = $record['id'];
            $queryUpdate = "UPDATE `attendance`
                            SET `out_time` = '" . time() . "'
                            WHERE `id` = $id";
            $this->db->query($queryUpdate);
    
            // Ghi trạng thái đã checkout
            $this->session->set_userdata('checked_out', true);
        }
    
        redirect('attendance');
    }
    

    public function new_form()
    {
        // Reset trạng thái chấm công
        $this->session->unset_userdata('checked_in');
        $this->session->unset_userdata('checked_out');

        redirect('attendance'); // Quay lại trang index
    }

    public function stats()
    {
        $d['title'] = 'Statistics';
        $d['account'] = $this->Public_model->getAccount($this->session->userdata['username']);
        $d['e_id'] = $d['account']['id'];
        $d['data'] = $this->attendance_details_data($d['e_id']);

        $this->load->view('templates/table_header', $d);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar');
        $this->load->view('attendance/stats', $d);
        $this->load->view('templates/table_footer');
    }

    private function attendance_details_data($e_id)
    {
        $start = $this->input->get('start');
        $end = $this->input->get('end');

        $d['attendance'] = $this->Public_model->get_attendance($e_id, $start, $end);

        $d['start'] = $start;
        $d['end'] = $end;

        return $d;
    }

}