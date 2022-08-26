<?php 
	use Illuminate\Support\Facades\DB;
	use App\Models\Admin\Room;
	use App\Models\Review;

	function default_image()
	{
		$default_image=url('').'/assets/backend/image/common/default.jpg';
		return $default_image;
	}

	function logo()
	{
		$logo=url('').'/assets/common/logo.png';
		return $logo;
	}

	function socials()
	{
		$data=DB::table('socials')->orderBy('id','desc')->get();
		return $data;
	}

	function price_format($price)
	{
		return '৳'.number_format($price,2);
	}


	function gender(){
		return ['male','female','other'];
	}

	function total_test($report){
		return count($report->testResults);
	}

	function stop($report){
		return round(total_test($report)/2);
	}




 ?>