<?php
include("../db/db.php");
session_start();

function my_autoloader($class) {
    require $class . '.php';
}
spl_autoload_register(function ($class) {
    include $class . '.php';
});
my_autoloader('../Modals/OrderList');



if (isset($_SESSION["super_b_id"])) {
    $b_id = $_SESSION['super_b_id'];
}else{
    $super_sql = "SELECT super_b_id as b_id FROM super_admin WHERE unique_id='1'";
    $super_query=mysqli_query($con, $super_sql);
    $super_query_num=mysqli_num_rows($super_query);
    if ($super_query_num ==1 || $super_query_num > 0) {
        $super = mysqli_fetch_assoc($super_query);

        $b_id = $super['b_id'];

        $_SESSION['super_b_id'] = $b_id;
    }else{
        $b_id = 0;
    }
}

if(isset($_SESSION["user"]) && isset($_SESSION['b_id'])){
    if(isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]==true){
        $user = $_SESSION['user'];
        $user_id = $_SESSION['user_id'];
        $user_u_id = $_SESSION['unique_id'];
        $user_phone = $_SESSION['user_phone'];
        $user_b_id = $_SESSION['b_id'];
        $user_role = $_SESSION['role'];
        $user_logged_in = $_SESSION['logged_in'];
    }else{
        $user = "";
        $user_id = "";
        $user_u_id = "";
        $user_phone = "";
        $user_b_id = "";
        $user_role = "";
        $user_logged_in = false;
    }


}else{
    $user = "";
    $user_id = "";
    $user_u_id = "";
    $user_phone = "";
    $user_b_id = "";
    $user_role = "";
    $user_logged_in = false;
}

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pick a Meeting Appoinment Date</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="./style.css">

  <link rel="stylesheet" href="../output/./output.css">
	
         <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->

         <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../jquery-3.4.1.js"></script>
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> -->
    <link rel="stylesheet" href="../icon/bootstrap-icons.css">

    <!-- <script src="ck/ckeditor.js"></script> -->
    <!-- <script src="f/admin/ckeditor/ckeditor.js"></script> -->

    <!-- <script src="//cdn.ckeditor.com/4.16.2/full/ckeditor.js"></script> -->
    <script src="../jquery-3.5.1.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

    <!-- swap -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/css/swiper.css">
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- swap -->

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/jquery-3.5.1.min.js"></script>

    <script src="../bootstrap.min.js"></script>
    <script src="../bootstrap.bundle.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  

</head>
<body>

<div class="container-fluid mt-3">
	<div class="row">
		<div class="col-md-4">

		<div class="app-container" ng-app="dateTimeApp" ng-controller="dateTimeCtrl as ctrl" ng-cloak>
			
			<div date-picker
				datepicker-title="Select Date"
				picktime="true"
				pickdate="true"
				pickpast="false"
				mondayfirst="false"
				custom-message="You have selected"
				selecteddate="ctrl.selected_date"
				updatefn="ctrl.updateDate(newdate)">
			
				<div class="datepicker"
					ng-class="{
						'am': timeframe == 'am',
						'pm': timeframe == 'pm',
						'compact': compact
					}">
					<div class="datepicker-header">
						<div class="datepicker-title" ng-if="datepicker_title">{{ datepickerTitle }}</div>
						<div class="datepicker-subheader">{{ customMessage }} {{ selectedDay }} {{ monthNames[localdate.getMonth()] }} {{ localdate.getDate() }}, {{ localdate.getFullYear() }}</div>
					</div>
					<div class="datepicker-calendar">
						<div class="calendar-header">
							<div class="goback" ng-click="moveBack()" ng-if="pickdate">
								<svg width="30" height="30">
									<path fill="none" stroke="#0DAD83" stroke-width="3" d="M19,6 l-9,9 l9,9"/>
								</svg>
							</div>
							<div class="current-month-container">{{ currentViewDate.getFullYear() }} {{ currentMonthName() }}</div>
							<div class="goforward" ng-click="moveForward()" ng-if="pickdate">
								<svg width="30" height="30">
									<path fill="none" stroke="#0DAD83" stroke-width="3" d="M11,6 l9,9 l-9,9" />
								</svg>
							</div>
						</div>
						<div class="calendar-day-header">
							<span ng-repeat="day in days" class="day-label">{{ day.short }}</span>
						</div>
						<div class="calendar-grid" ng-class="{false: 'no-hover'}[pickdate]">
							<div
								ng-class="{'no-hover': !day.showday}"
								ng-repeat="day in month"
								class="datecontainer"
								ng-style="{'margin-left': calcOffset(day, $index)}"
								track by $index>
								<div class="datenumber" ng-class="{'day-selected': day.selected }" ng-click="selectDate(day)">
									{{ day.daydate }}
								</div>
							</div>
						</div>
					</div>
					<div class="timepicker" ng-if="picktime == 'true'">
						<div ng-class="{'am': timeframe == 'am', 'pm': timeframe == 'pm' }">
							<div class="timepicker-container-outer" selectedtime="time" timetravel>
								<div class="timepicker-container-inner">
									<div class="timeline-container" ng-mousedown="timeSelectStart($event)" sm-touchstart="timeSelectStart($event)">
										<div class="current-time">
											<div class="actual-time">{{ time }}</div>
										</div>
										<div class="timeline">
										</div>
										<div class="hours-container">
											<div class="hour-mark" ng-repeat="hour in getHours() track by $index"></div>
										</div>
									</div>
									<div class="display-time">
										<div class="decrement-time" ng-click="adjustTime('decrease')">
											<svg width="24" height="24">
												<path stroke="white" stroke-width="2" d="M8,12 h8"/>
											</svg>
										</div>
										<div class="time" ng-class="{'time-active': edittime.active}">
											<input type="text" class="time-input" ng-model="edittime.input" ng-keydown="changeInputTime($event)" ng-focus="edittime.active = true; edittime.digits = [];" ng-blur="edittime.active = false"/>
											<div class="formatted-time">{{ edittime.formatted }}</div>
										</div>
										<div class="increment-time" ng-click="adjustTime('increase')">
											<svg width="24" height="24">
												<path stroke="white" stroke-width="2" d="M12,7 v10 M7,12 h10"/>
											</svg>
										</div>
									</div>
									<div class="am-pm-container">
										<div class="am-pm-button" ng-click="changetime('am');">am</div>
										<div class="am-pm-button" ng-click="changetime('pm');">pm</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					
					<div class="buttons-container">
						<div class="cancel-button">CANCEL</div>
						<div class="save-button">SAVE</div>
					</div>
					
				</div>
			</div>
		</div>
		</div>
		<div class="col-md-8">

		<div class="container" id="booking_cart_row_data">


		<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-16 py-3">
                                      <span class="sr-only">Image</span>
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Product
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Qty
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Side(Min)
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Price
                                  </th>
                                  <th scope="col" class="px-6 py-3">
                                      Action
                                  </th>
                              </tr>
                          </thead>
                          <tbody >


    <?php

    if(empty($_SESSION['design_cart'])){
        $total = 0;
        $qntotal = 0;
    }?>
    <?php if(isset($_SESSION['design_cart'])){
        $total = 0;
        $qntotal = 0;
        foreach($_SESSION['design_cart'] as $k=> $item){
            $total = $total + ($item['quantity'] * $item['price']);
            $qntotal = $qntotal +$item['quantity'];
            
        }


        $orderList = convertSessionToObjects('design_cart');

        foreach ($orderList as $index => $list) {
            ?>

                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" id="<?=$index?>">
                    <td class="p-4">
                        <img src="../image/<?=$list->getProImage()?>" class="w-16 md:w-32 max-w-full max-h-full" alt="<?=$list->getProName()?>">
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                        <?=$list->getProName()?>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <button class="inline-flex plus_d_btn items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                                </svg>
                            </button>
                            <div>
                                <input type="number" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="<?=$list->getQuantity()?>" placeholder="1" id="design_q_<?=$index?>" required>
                            </div>
                            <button class="inline-flex minus_d_btn items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" id="<?=$index?>" type="button">
                                <span class="sr-only">Quantity button</span>
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                                </svg>
                            </button>
                        </div>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <?=$list->getTotalPrice()?>
                    </td>
                    <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
                    <select class="design_side_selection" name="design_side" id="<?=$index?>" required>
                        <option value='no' ><?=$list->getSide()?> Side</option>
                        <option value='1'>Single Side</option>
                        <option value='2'>Double Side</option>
                        <option value='3'>Three Side</option>
                        <option value='4'>Four Side</option>
                        <option value='0'>More 1</option>
                        <option value='5'>More 2</option>
                    </select>
                    </td>
                    <td class="px-6 py-4">
                        <a href="#" class="font-medium remove_design_btn text-red-600 dark:text-red-500 hover:underline" id="<?=$index?>">Remove</a>
                    </td>
                </tr>

            <?php
        }

    }

    ?>
<!-- 
    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
      <td class="p-4">
          <img src="/docs/images/products/apple-watch.png" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple Watch">
      </td>
      <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
          Apple Watch
      </td>
      <td class="px-6 py-4">
          <div class="flex items-center">
              <button class="inline-flex items-center justify-center p-1 me-3 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                  <span class="sr-only">Quantity button</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                  </svg>
              </button>
              <div>
                  <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
              </div>
              <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                  <span class="sr-only">Quantity button</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
              </button>
          </div>
      </td>
      <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
          $599
      </td>
      <td class="px-6 py-4">
          <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
      </td>
  </tr>
  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
      <td class="p-4">
          <img src="/docs/images/products/imac.png" class="w-16 md:w-32 max-w-full max-h-full" alt="Apple iMac">
      </td>
      <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
          iMac 27"
      </td>
      <td class="px-6 py-4">
          <div class="flex items-center">
              <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                  <span class="sr-only">Quantity button</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                  </svg>
              </button>
              <div class="ms-3">
                  <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
              </div>
              <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                  <span class="sr-only">Quantity button</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
              </button>
          </div>
      </td>
      <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
          $2499
      </td>
      <td class="px-6 py-4">
          <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
      </td>
  </tr>
  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
      <td class="p-4">
          <img src="/docs/images/products/iphone-12.png" class="w-16 md:w-32 max-w-full max-h-full" alt="iPhone 12">
      </td>
      <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
          IPhone 12 
      </td>
      <td class="px-6 py-4">
          <div class="flex items-center">
              <button class="inline-flex items-center justify-center p-1 text-sm font-medium h-6 w-6 text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                  <span class="sr-only">Quantity button</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                  </svg>
              </button>
              <div class="ms-3">
                  <input type="number" id="first_product" class="bg-gray-50 w-14 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-2.5 py-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="1" required>
              </div>
              <button class="inline-flex items-center justify-center h-6 w-6 p-1 ms-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-full focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" type="button">
                  <span class="sr-only">Quantity button</span>
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                  </svg>
              </button>
          </div>
      </td>
      <td class="px-6 py-4 font-semibold text-gray-900 dark:text-white">
          $999
      </td>
      <td class="px-6 py-4">
          <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Remove</a>
      </td>
  </tr> -->
</tbody>
</table>


<div class="container-fluid">
    <div class="row">
        
        <div class="mt-3 w-full ">
            <a href="appoinment" class="text-decoration-none decoration-none">
            <button type="button" class="btn btn-info pickDate" id="pickDate">Checkout With <?=calculateTotalPrice('design_cart')?> BDT</button>
            </a>
        </div>
    </div>
</div>

		</div>

		</div>
	</div>
	<div class="row">

	</div>
</div>

<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.5.2/angular.min.js'></script>
<script  src="./script.js"></script>
</body>
</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/platform/1.3.6/platform.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/5.4.5/js/swiper.min.js"></script>

<script src="../jsnav/bootstrap.bundle.js"></script>
    <script src="../jquery-3.4.1.min.js"></script>
    <script src="../sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" ></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" ></script>
  <script src="//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>



<script>
    $(document).ready(function(){
	//bind enter key to click button
	$(document).keypress(function(e){
    	if (e.which == 13){
    		if($('#loginform').is(":visible")){
    			$("#loginbutton").click();
    		}
        	else if($('#signupform').is(":visible")){
        		$("#signupbutton").click();
        	}
    	}
	});

	$('#signup').click(function(){
		$('#loginform').slideUp();
		$('#signupform').slideDown();
		$('#myalert').slideUp();
		$('#signform')[0].reset();
	});

	$('#login').click(function(){
		$('#loginform').slideDown();
		$('#signupform').slideUp();
		$('#myalert').slideUp();
		$('#logform')[0].reset();
	});




$(document).on('click','.remove_product_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            remove_p: true
          },
          success: function(response){
              // alert(response);

              orderCart();


          }
        });
});


$(document).on('click','.remove_design_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            remove_d: true
          },
          success: function(response){
              // alert(response);

              bookingCart();

          }
        });
});




$(document).on('click','.design_side_selection', function(){

var p_id = $(this).attr('id');

var side = $(this).val();
// alert("box"+p_id);
        
if(side!='no'){
    $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            side:side,
            side_set: true
          },
          success: function(response){
              // alert(response);
            if(response==1){
                Swal.fire({
                    type: 'success',
                    title: "Design Successfully Added to Cart!",
                    text: "Thank you ",
                    icon: "success",
                    button: false,
                    dangerMode: true,
                    timer: 3000,
                
                });
                        setTimeout(function(){
                            bookingCart();
                        }, 2000);
            }else{
                alert("sorry");
                bookingCart();

            }


          }
    });
}

});


$(document).on('click','.minus_p_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            minus_p: true
          },
          success: function(response){
              // alert(response);

              orderCart();


          }
        });
});


$(document).on('click','.plus_p_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            plus_p: true
          },
          success: function(response){
              // alert(response);

              orderCart();


          }
        });
});


$(document).on('click','.minus_d_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            minus_d: true
          },
          success: function(response){
              // alert(response);

              bookingCart();

          }
        });
});


$(document).on('click','.plus_d_btn', function(){

var p_id = $(this).attr('id');
// alert("box"+p_id);
        
        $.ajax({
          url:'../product/design_product.php',
          type:'post',
          data: {
            p_id:p_id,
            plus_d: true
          },
          success: function(response){
              // alert(response);

              bookingCart();

          }
        });
});

$('#order_cart_row_data').ready(function(){

  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });

  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
      booking_cart_2: true
    },
    success: function(response){
      $('#booking_cart_row_data').html(response);

    }
  });

});  

function orderCart(){
  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });
};

function bookingCart(){
  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
        booking_cart_2: true
    },
    success: function(response){
      $('#booking_cart_row_data').html(response);

    }
  });
};

function book_order_cart(){
  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
      order_cart: true
    },
    success: function(response){
      $('#order_cart_row_data').html(response);

    }
  });

  $.ajax({
    url:'../product/design_product.php',
    type:'post',
    data: {
        booking_cart_2: true
    },
    success: function(response){
      $('#booking_cart_row_data').html(response);

    }
  });
};

  $(document).on('click', '.add_to_design_cart_btn', function(){


      var did = $(this).attr('id');
      // alert("fhia"+did);
			$('#myalert').slideUp();
			var design_form = $('#design_'+did).serialize();
			$.ajax({
				method: 'POST',
				url: '../product/design_product.php',
				data: design_form,

				success:function(data){
                    if(data==1){
                        Swal.fire({
                                type: 'success',
                                title: "Design Successfully Added to Cart!",
                                text: "Thank you ",
                                icon: "success",
                                button: false,
                                dangerMode: true,
                                timer: 3000,
                            
                            });
                        setTimeout(function(){
                        $('#myalert').slideDown();
                        $('#alerttext').html("Design Successfully Added to Cart!");
                        $('#class_add_btn').val('Save Class');
                        $('#class_form_data')[0].reset();
                        }, 2000);
                        setTimeout(function(){
                          book_order_cart();
                        }, 3000);
                    }else{
                        Swal.fire({
                                type: 'warning',
                                title: "Please Try Again!",
                                text: "Thanks"+data,
                                icon: "warning",
                                button: false,
                                dangerMode: true,
                                timer: 3000,
                            
                            });
                        setTimeout(function(){
                        $('#myalert').slideDown();
                        $('#alerttext').html(data);
                        }, 2000);
                        setTimeout(function(){
                        // location.reload();
                        }, 3000);
                    }
                   
				}
			});
		

	});        


  $(document).on('click', '.add_to_product_cart_btn', function(){


var did = $(this).attr('id');
// alert("fhia"+did);
$('#myalert').slideUp();
var product_form = $('#product_'+did).serialize();
$.ajax({
  method: 'POST',
  url: '../product/design_product.php',
  data: product_form,

  success:function(data){
              if(data==1){
                  Swal.fire({
                          type: 'success',
                          title: "Design Successfully Added to Cart!",
                          text: "Thank you ",
                          icon: "success",
                          button: false,
                          dangerMode: true,
                          timer: 3000,
                      
                      });
                  setTimeout(function(){
                  $('#myalert').slideDown();
                  $('#alerttext').html("Design Successfully Added to Cart!");
                  }, 2000);
                  setTimeout(function(){
                    book_order_cart()
                  }, 3000);
              }else{
                  Swal.fire({
                          type: 'warning',
                          title: "Please Try Again!",
                          text: "Thanks"+data,
                          icon: "warning",
                          button: false,
                          dangerMode: true,
                          timer: 3000,
                      
                      });
                  setTimeout(function(){
                  $('#myalert').slideDown();
                  $('#alerttext').html(data);
                  }, 2000);
                  setTimeout(function(){
                  // location.reload();
                  }, 3000);
              }
             
  }
});


});

	$(document).on('click', '#signupbutton', function(){
		if($('#susername').val()!='' && $('#spassword').val()!=''){
			$('#signupbutton').val('Signing up...');
			$('#myalert').slideUp();
			var signform = $('#signform').serialize();
			$.ajax({
				method: 'POST',
				url: 'user/login.php',
				data: signform,

				success:function(data){
					setTimeout(function(){
					$('#myalert').slideDown();
					$('#alerttext').html(data);
					$('#signupbutton').val('Sign up');
					$('#signform')[0].reset();
              //  alert(data);
					}, 2000);
				}
			});
		}
		else{
			alert('Please input all fields to Sign Up');
		}
	});

	$(document).on('click', '#loginbutton', function(){
		if($('#username').val()!=''){
			$('#loginbutton').val('Logging in...');
			$('#myalert').slideUp();
			var logform = $('#logform').serialize();
			setTimeout(function(){
				$.ajax({
					method: 'POST',
					url: 'user/login.php',
					data: logform,
					success:function(data){
						if(data==1){
							$('#myalert').slideDown();
							$('#alerttext').text('Login Successful. User Verified!');
							$('#loginbutton').val('Thank You!');
							$('#logform')[0].reset();
							setTimeout(function(){
								// location.reload();
                window.location.href = 'user/';
							}, 2000);
						}
						else{
							$('#myalert').slideDown();
							$('#alerttext').html(data);
							$('#loginbutton').val('Try Again!');
							$('#logform')[0].reset();
						}
					}
				});
			}, 2000);
		}
		else{
			alert('Please input Phone fields to Login');
		}
	});
});
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.5/swiper-bundle.min.js'></script>
  <script src="../dist/js/scriptc.js"></script>
  <script src="../page.js"></script>
  <script src="dist/js/scriptp.js"></script>
  <script type="text/javascript" src="../dist/js/script_p_c.js"></script>
  <script src="../dist/js/service_c.js"></script>
  <script src="../js/sweetalert.min.js"></script>
<script src="../js/sweetalert2.all.min.js"></script>
