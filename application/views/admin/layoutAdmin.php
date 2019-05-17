<?php

$this->load->view('admin/layout/headerAdmin_view');
$this->load->view('admin/layout/sidebarAdmin_view');

$this->load->view($view);

$this->load->view('admin/layout/footerAdmin_view');