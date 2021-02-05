<?php
defined('BASEPATH') or exit('No direct script access allowed');

if (!function_exists('get_settings')) {
	function get_settings($key = '')
	{
		$CI = &get_instance();

		$row = $CI->db
			->select('content')
			->where('key', $key)
			->get('settings')
			->row();

		return $row->content;
	}
}

if (!function_exists('update_settings')) {
	function update_settings($key, $new_content)
	{
		$CI = init();

		$CI->db->where('key', $key)
			->update('settings', array('content' => $new_content));
	}
}

if (!function_exists('get_store_name')) {
	function get_store_name()
	{
		return get_settings('store_name');
	}
}


//untuk mendapatkan image admin
if (!function_exists('get_admin_image')) {
	function get_admin_image()
	{
		$id = get_current_user_id();
		$CI = init();

		$data = $CI->db->select('profile_picture')->where('id', $id)->get('users')->row();
		$profile_picture = $data->profile_picture;

		if (file_exists('assets/uploads/users/' . $profile_picture)) //jika ada
			$file = $profile_picture;
		else //jika tidak ada
			$file = 'avatar.png'; //default image untuk admin

		return base_url('assets/uploads/users/' . $file);
	}
}

//untuk mendapatkan nama admin
if (!function_exists('get_admin_name')) {
	function get_admin_name()
	{
		$data = user_data();

		return $data->name;
	}
}

//untuk mendapatkan nama user
if (!function_exists('get_user_name')) {
	function get_user_name()
	{
		$CI = init();
		$id = get_current_user_id();

		//pilih dari table users dan customer dengan user id 
		$user = $CI->db->query("
            SELECT u.*, c.*
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();

		return $user->name;
	}
}

//untuk mendapatkan image user
if (!function_exists('get_user_image')) {
	function get_user_image()
	{
		$CI = init();
		$id = get_current_user_id();

		$user = $CI->db->query("
            SELECT u.*, c.*
            FROM users u
            JOIN customers c
                ON c.user_id = u.id
            WHERE u.id = '$id'
        ")->row();

		$picture = $user->profile_picture;
		$file = './assets/uploads/users/' . $picture;

		if (!file_exists($file))
			$picture_name = $picture;
		else
			$picture_name = 'avatar.png';

		return base_url('assets/uploads/users/' . $picture_name);
	}
}

if (!function_exists('get_store_logo')) {
	function get_store_logo()
	{
		$file = get_settings('store_logo');
		return base_url('assets/uploads/sites/' . $file);
	}
}

if (!function_exists('get_formatted_date')) {
	function get_formatted_date($source_date)
	{
		$d = strtotime($source_date);

		$year = date('Y', $d);
		$month = date('n', $d);
		$day = date('d', $d);
		$day_name = date('D', $d);

		$day_names = array(
			'Sun' => 'Sunday',
			'Mon' => 'Monday',
			'Tue' => 'Tuesday',
			'Wed' => 'Wednesday',
			'Thu' => 'Thursday',
			'Fri' => 'Friday',
			'Sat' => 'Saturday'
		);
		$month_names = array(
			'1' => 'January',
			'2' => 'February',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'November',
			'11' => 'Octover',
			'12' => 'Descember'
		);
		$day_name = $day_names[$day_name];
		$month_name = $month_names[$month];

		$date = "$day_name, $day $month_name $year";

		return $date;
	}
}


//number format dalam rupiah
if (!function_exists('format_rupiah')) {
	function format_rupiah($rp)
	{
		return number_format($rp, 2, ',', '.');
	}
}


//untuk membuat SKU
if (!function_exists('create_product_sku')) {
	function create_product_sku($name, $category, $price, $stock)
	{
		$name = create_acronym($name);
		$category = create_acronym($category);
		$price = create_acronym($price);
		$stock = $stock;
		$key = substr(time(), -3);

		$sku =  $name . $category . $price . $stock . $key;
		return $sku;
	}
}

if (!function_exists('create_acronym')) {
	function create_acronym($words)
	{
		$words = explode(' ', $words);
		$acronym = '';

		foreach ($words as $word) {
			$acronym .= $word[0];
		}

		$acronym = strtoupper($acronym);

		return $acronym;
	}
}

if (!function_exists('count_percent_discount')) {
	function count_percent_discount($discount, $from, $num = 1)
	{
		$count = ($discount / $from) * 100;
		$count = number_format($count, $num);

		return $count;
	}
}

if (!function_exists('get_product_image')) {
	function get_product_image($id)
	{
		$CI = init();
		$CI->load->model('product_model');

		$data = $CI->product_model->product_data($id);
		$picture_name = $data->picture_name;

		if (!$picture_name)
			$picture_name = 'default.jpg';

		$file = './assets/uploads/products/' . $picture_name;

		return base_url('assets/uploads/products/' . $picture_name);
	}
}

if (!function_exists('get_order_status')) {
	function get_order_status($status, $payment)
	{
		if ($payment == 1) {
			// Bank
			if ($status == 1)
				return 'Waiting for payments';
			else if ($status == 2)
				return 'In process';
			else if ($status == 3)
				return 'Shipping';
			else if ($status == 4)
				return 'Delivered';
			else if ($status == 5)
				return 'Cancelled';
		} else if ($payment == 2) {
			//COD
			if ($status == 1)
				return 'In process';
			else if ($status == 2)
				return 'Shipping';
			else if ($status == 3)
				return 'Delivered';
			else if ($status == 4)
				return 'Cancelled';
		}
	}
}

if (!function_exists('get_payment_status')) {
	function get_payment_status($status)
	{
		if ($status == 1)
			return 'Waiting for confirmation';
		else if ($status == 2)
			return 'Confirmated';
		else if ($status == 3)
			return 'Payment not found';
	}
}

if (!function_exists('get_contact_status')) {
	function get_contact_status($status)
	{
		if ($status == 1)
			return 'Unread';
		else if ($status == 2)
			return 'Read';
		else if ($status == 3)
			return 'Replayed';
	}
}

if (!function_exists('get_month')) {
	function get_month($mo)
	{
		$months = array(
			'1' => 'January',
			'2' => 'February',
			'3' => 'March',
			'4' => 'April',
			'5' => 'May',
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
		);

		return $months[$mo];
	}
}
