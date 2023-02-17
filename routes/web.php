<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\Admincontroller;
use App\Http\Controllers\Auth\Adminlogincontroller;


use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HeaderFooterController;
use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\ContactusController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CourserController;
use App\Http\Controllers\Admin\NotesController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\StudentAlumni;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Student\Studentlogincontroller;
use App\Http\Controllers\Student\Studentcontroller;
use App\Http\Controllers\Home_controller;
use App\Http\Controllers\Form_controller;
use App\Http\Controllers\Course_payment_Controller;
use App\Http\Controllers\Buyer\Auth\BuyerloginController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[Home_controller::class, 'index']);

Route::get('/courser_offered',[Home_controller::class, 'courser_offered']);

Route::get('/about_us',[Home_controller::class, 'about_us']);

Route::get('/blog',[Home_controller::class, 'blog']);

Route::get('/blog_detail/{id}',[Home_controller::class, 'blog_detail']);

Route::get('/search_blog',[Home_controller::class, 'search_blog']);

Route::get('/consultation',[Home_controller::class, 'consultation']);

Route::get('/filter_data',[Home_controller::class, 'filter_data']);

Route::get('/contact_us',[Home_controller::class, 'contact_us']);

Route::get('/login',[Home_controller::class, 'login']);

Route::get('/register',[Home_controller::class, 'register']);

Route::get('/studentalumni',[Home_controller::class, 'studentalumni']);


Route::post('/register_user',[Form_controller::class, 'register_user']);

Route::get('/login_user',[Studentlogincontroller::class, 'login_user']);

Route::post('/contact_admin',[Form_controller::class, 'contact_admin']);

Route::post('/getinquiry',[Form_controller::class, 'getinquiry']);


Route::get('/course_detail/{id}',[Home_controller::class, 'course_detail']);

Route::get('/sub_course_detail/{id}',[Home_controller::class, 'sub_course_detail']);


Route::get('/faq',[Home_controller::class, 'faq']);




Route::get('/review',[Home_controller::class, 'review']);

Route::post('/submit_review',[Home_controller::class, 'submit_review']);


Route::post('/pay_for_course',[Course_payment_Controller::class, 'pay_for_course']);

Route::post('/pay_amount',[Course_payment_Controller::class, 'pay_amount']);

Route::get('/payment_success',[Course_payment_Controller::class, 'payment_success']);


Route::get('/payment',[Course_payment_Controller::class, 'payment']);


Route::get('/change_student_status/{id}',[Course_payment_Controller::class, 'change_student_status']);

Route::get('/get_category_data/{id}',[Course_payment_Controller::class, 'get_category_data']);


Route::post('/half_payment',[Course_payment_Controller::class, 'half_payment']);


Route::post('/pay_half_payment',[Course_payment_Controller::class, 'pay_half_payment']);



Route::post('/register_student',[Home_controller::class, 'register_student']);

Route::get('/check_register_student',[Home_controller::class, 'check_register_student']);















Route::get('/product/{id}',[Home_controller::class, 'product']);

Route::get('/product_detail/{id}',[Home_controller::class, 'product_detail']);

Route::get('/search_product/{id}',[Home_controller::class, 'search_product']);

Route::get('/search_product_ck/{id}',[Home_controller::class, 'search_product_ck']);


Route::get('/sub_product/{id}',[Home_controller::class, 'sub_product']);

Route::get('/sub_search_product/{id}',[Home_controller::class, 'sub_search_product']);

Route::get('/sub_search_product_ck/{id}',[Home_controller::class, 'sub_search_product_ck']);










Route::post('/checkout_process',[Home_controller::class, 'checkout_process']);


Route::middleware('authBuyer')->group(function () {

Route::get('/view_cart/{id}',[Home_controller::class, 'view_cart']);

Route::post('/add_cart/{id}',[Home_controller::class, 'add_cart']);

Route::get('/delete_add_cart/{id}',[Home_controller::class, 'delete_add_cart']);

Route::get('/check_quantity',[Home_controller::class, 'check_quantity']);

Route::get('/checkout',[Home_controller::class, 'checkout']);

Route::post('/minus_qty',[Home_controller::class, 'minus_qty']);

Route::post('/plus_qty',[Home_controller::class, 'plus_qty']);

Route::get('/buy_product/{id}',[Home_controller::class, 'buy_product']);

Route::post('/place_order',[Home_controller::class, 'place_order']);

Route::get('/order_success',[Home_controller::class, 'order_success']);

Route::get('/order_histroy/{id}',[Home_controller::class, 'order_histroy']);







 });






Route::get('/privacy_policy',[Home_controller::class, 'privacy_policy']);

Route::get('/term_and_condition',[Home_controller::class, 'term_and_condition']);

Route::get('/cancellation_refund',[Home_controller::class, 'cancellation_refund']);




Route::prefix('admin')->group(function(){

Route::get('/login',[Adminlogincontroller::class, 'login']);
Route::post('/login',[Adminlogincontroller::class, 'authenticate'])->name('login');
Route::get('/logout',[Adminlogincontroller::class, 'logout'])->name('adminlogout');

Route::get('/forgetpasswordview',[Adminlogincontroller::class, 'forgetpasswordview'])->name('forgetpasswordview');
Route::post('/resetpasswordlink',[Adminlogincontroller::class, 'resetpasswordlink'])->name('resetpasswordlink');

Route::get('/resetpasswordview/{id}',[Adminlogincontroller::class, 'resetpasswordview'])->name('resetpasswordview');
Route::post('/resetpassword/{id}',[Adminlogincontroller::class, 'resetpassword'])->name('resetpassword');

Route::get('/changepassword',[Admincontroller::class, 'changepassword']);
Route::post('/updatepassword/{id}',[Admincontroller::class, 'updatepassword']);

Route::get('/home',[Admincontroller::class, 'home']);



/*Edit Profile     Edit Profile     Edit Profile     Edit Profile     Edit Profile     Edit Profile     */


Route::get('/edit_profile',[Admincontroller::class, 'edit_profile']);
Route::post('/store_edit_profile',[Admincontroller::class, 'store_edit_profile']);





/*Home Route       Home Route       Home Route       Home Route       Home Route       Home Route       Home Route       Home Route       Home Route      */

Route::get('/contact_admin_data',[HomeController::class, 'contact_admin_data']);

Route::get('/delete_contact_admin_data/{id}',[HomeController::class, 'delete_contact_admin_data']);

Route::get('/view_contact_admin_data/{id}',[HomeController::class, 'view_contact_admin_data']);





Route::get('/home_banner',[HomeController::class, 'home_banner']);

Route::get('/add_home_banner_data/{id}',[HomeController::class, 'add_home_banner_data']);
Route::post('/store_add_home_banner_data/{id}',[HomeController::class, 'store_add_home_banner_data']);

Route::get('/delete_home_banner/{id}',[HomeController::class, 'delete_home_banner']);




Route::get('/home_about',[HomeController::class, 'home_about']);

Route::get('/update_home_about_description_data/{id}',[HomeController::class, 'update_home_about_description_data']);
Route::post('/store_update_home_about_description_data/{id}',[HomeController::class, 'store_update_home_about_description_data']);

Route::get('/add_home_about_data/{id}',[HomeController::class, 'add_home_about_data']);
Route::post('/store_add_home_about_data/{id}',[HomeController::class, 'store_add_home_about_data']);

Route::get('/delete_home_about/{id}',[HomeController::class, 'delete_home_about']);




Route::get('/home_blog',[HomeController::class, 'home_blog']);

Route::get('/update_home_blog_description_data/{id}',[HomeController::class, 'update_home_blog_description_data']);
Route::post('/store_update_home_blog_description_data/{id}',[HomeController::class, 'store_update_home_blog_description_data']);

Route::get('/add_home_blog_data/{id}',[HomeController::class, 'add_home_blog_data']);
Route::post('/store_add_home_blog_data/{id}',[HomeController::class, 'store_add_home_blog_data']);

Route::get('/delete_home_blog/{id}',[HomeController::class, 'delete_home_blog']);







Route::get('/home_faq',[HomeController::class, 'home_faq']);

Route::get('/update_home_faq_description_data/{id}',[HomeController::class, 'update_home_faq_description_data']);
Route::post('/store_update_home_faq_description_data/{id}',[HomeController::class, 'store_update_home_faq_description_data']);

Route::get('/add_home_faq_data/{id}',[HomeController::class, 'add_home_faq_data']);
Route::post('/store_add_home_faq_data/{id}',[HomeController::class, 'store_add_home_faq_data']);

Route::get('/delete_home_faq/{id}',[HomeController::class, 'delete_home_faq']);





Route::get('/home_demo',[HomeController::class, 'home_demo']);

Route::get('/add_home_demo_data/{id}',[HomeController::class, 'add_home_demo_data']);
Route::post('/store_add_home_demo_data/{id}',[HomeController::class, 'store_add_home_demo_data']);




Route::get('/home_testimonial',[HomeController::class, 'home_testimonial']);

Route::get('/update_home_testimonial_description_data/{id}',[HomeController::class, 'update_home_testimonial_description_data']);
Route::post('/store_update_home_testimonial_description_data/{id}',[HomeController::class, 'store_update_home_testimonial_description_data']);

Route::get('/add_home_testimonial_data/{id}',[HomeController::class, 'add_home_testimonial_data']);
Route::post('/store_add_home_testimonial_data/{id}',[HomeController::class, 'store_add_home_testimonial_data']);

Route::get('/delete_home_testimonial/{id}',[HomeController::class, 'delete_home_testimonial']);






/*25-11-2022 new    25-11-2022 new    25-11-2022 new    25-11-2022 new    25-11-2022 new    25-11-2022 new    */




Route::get('/change_status_testi/{id}',[HomeController::class, 'change_status_testi']);




/*New      New      New      New      New      New      New      */

Route::get('/home_advertise',[HomeController::class, 'home_advertise']);

Route::get('/add_home_advertise_data/{id}',[HomeController::class, 'add_home_advertise_data']);
Route::post('/store_add_home_advertise_data/{id}',[HomeController::class, 'store_add_home_advertise_data']);

Route::get('/delete_home_advertise/{id}',[HomeController::class, 'delete_home_advertise']);


/* 29-11-2022  New     29-11-2022  New    29-11-2022  New    29-11-2022  New    29-11-2022  New    29-11-2022  New    29-11-2022  New    */



Route::get('/home_product_des',[HomeController::class, 'home_product_des']);

Route::get('/add_home_product_des_data/{id}',[HomeController::class, 'add_home_product_des_data']);
Route::post('/store_add_home_product_des_data/{id}',[HomeController::class, 'store_add_home_product_des_data']);




/*HeaderFooter Route      HeaderFooter Route      HeaderFooter Route      HeaderFooter Route     HeaderFooter Route     HeaderFooter Route     */




Route::get('/header_offer',[HeaderFooterController::class, 'header_offer']);

Route::get('/add_header_offer_data/{id}',[HeaderFooterController::class, 'add_header_offer_data']);
Route::post('/store_add_header_offer_data/{id}',[HeaderFooterController::class, 'store_add_header_offer_data']);


Route::get('/header_contact',[HeaderFooterController::class, 'header_contact']);

Route::get('/add_header_contact_data/{id}',[HeaderFooterController::class, 'add_header_contact_data']);
Route::post('/store_add_header_contact_data/{id}',[HeaderFooterController::class, 'store_add_header_contact_data']);



Route::get('/footer_description',[HeaderFooterController::class, 'footer_description']);

Route::get('/add_footer_description_data/{id}',[HeaderFooterController::class, 'add_footer_description_data']);
Route::post('/store_add_footer_description_data/{id}',[HeaderFooterController::class, 'store_add_footer_description_data']);



Route::get('/social_links',[HeaderFooterController::class, 'social_links']);

Route::get('/add_social_links_data/{id}',[HeaderFooterController::class, 'add_social_links_data']);
Route::post('/store_add_social_links_data/{id}',[HeaderFooterController::class, 'store_add_social_links_data']);





Route::get('/courser_offered',[HeaderFooterController::class, 'courser_offered']);

Route::get('/add_courser_offered_data/{id}',[HeaderFooterController::class, 'add_courser_offered_data']);
Route::post('/store_add_courser_offered_data/{id}',[HeaderFooterController::class, 'store_add_courser_offered_data']);

Route::get('/delete_courser_offered/{id}',[HeaderFooterController::class, 'delete_courser_offered']);





Route::get('/add_banner_image_data/{id}',[HeaderFooterController::class, 'add_banner_image_data']);
Route::post('/store_add_banner_image_data/{id}',[HeaderFooterController::class, 'store_add_banner_image_data']);







/*Aboutus Route           Aboutus Route           Aboutus Route           Aboutus Route           Aboutus Route           Aboutus Route       */






Route::get('/aboutus_banner',[AboutusController::class,'aboutus_banner']);





Route::get('/aboutus_about',[AboutusController::class, 'aboutus_about']);

Route::get('/update_aboutus_about_description_data/{id}',[AboutusController::class, 'update_aboutus_about_description_data']);
Route::post('/store_update_aboutus_about_description_data/{id}',[AboutusController::class, 'store_update_aboutus_about_description_data']);

Route::get('/add_aboutus_about_data/{id}',[AboutusController::class, 'add_aboutus_about_data']);
Route::post('/store_add_aboutus_about_data/{id}',[AboutusController::class, 'store_add_aboutus_about_data']);

Route::get('/delete_aboutus_about/{id}',[AboutusController::class, 'delete_aboutus_about']);






Route::get('/aboutus_occult',[AboutusController::class, 'aboutus_occult']);


Route::get('/add_aboutus_occult_data/{id}',[AboutusController::class, 'add_aboutus_occult_data']);
Route::post('/store_add_aboutus_occult_data/{id}',[AboutusController::class, 'store_add_aboutus_occult_data']);






Route::get('/aboutus_astronomy',[AboutusController::class, 'aboutus_astronomy']);

Route::get('/update_aboutus_astronomy_description_data/{id}',[AboutusController::class, 'update_aboutus_astronomy_description_data']);
Route::post('/store_update_aboutus_astronomy_description_data/{id}',[AboutusController::class, 'store_update_aboutus_astronomy_description_data']);




Route::get('/aboutus_detail',[AboutusController::class, 'aboutus_detail']);


Route::get('/add_aboutus_detail_data/{id}',[AboutusController::class, 'add_aboutus_detail_data']);
Route::post('/store_add_aboutus_detail_data/{id}',[AboutusController::class, 'store_add_aboutus_detail_data']);

Route::get('/delete_aboutus_detail/{id}',[AboutusController::class, 'delete_aboutus_detail']);









/*Consultation Route     Consultation Route     Consultation Route      Consultation Route      Consultation Route    Consultation Route */



Route::get('/consultation_banner',[ConsultationController::class,'consultation_banner']);


Route::get('/delete_technology/{id}',[ConsultationController::class, 'delete_technology']);



Route::get('/our_astrologer',[ConsultationController::class, 'our_astrologer']);


Route::get('/add_our_astrologer_data/{id}',[ConsultationController::class, 'add_our_astrologer_data']);
Route::post('/store_add_our_astrologer_data/{id}',[ConsultationController::class, 'store_add_our_astrologer_data']);

Route::get('/delete_our_astrologer/{id}',[ConsultationController::class, 'delete_our_astrologer']);






/*Contactus Route     Contactus Route     Contactus Route    Contactus Route     Contactus Route     Contactus Route    Contactus Route   */



Route::get('/contact_banner',[ContactusController::class,'contact_banner']);





Route::get('/contact_title',[ContactusController::class, 'contact_title']);

Route::get('/update_contact_title_description_data/{id}',[ContactusController::class, 'update_contact_title_description_data']);
Route::post('/store_update_contact_title_description_data/{id}',[ContactusController::class, 'store_update_contact_title_description_data']);










/*Blog Route         Blog Route         Blog Route         Blog Route         Blog Route         Blog Route         Blog Route         */





Route::get('/blog_banner',[BlogController::class,'blog_banner']);




Route::get('/blog_detail',[BlogController::class, 'blog_detail']);

Route::get('/add_blog_detail_data/{id}',[BlogController::class, 'add_blog_detail_data']);
Route::post('/store_add_blog_detail_data/{id}',[BlogController::class, 'store_add_blog_detail_data']);

Route::get('/delete_blog_detail/{id}',[BlogController::class, 'delete_blog_detail']);





Route::get('/view_blog_detail/{id}',[BlogController::class, 'view_blog_detail']);








/*Courser Route     Courser Route    Courser Route     Courser Route    Courser Route     Courser Route   Courser Route   */



Route::get('/courser_banner',[CourserController::class,'courser_banner']);






Route::get('/courser_about',[CourserController::class, 'courser_about']);

Route::get('/update_courser_about_description_data/{id}',[CourserController::class, 'update_courser_about_description_data']);
Route::post('/store_update_courser_about_description_data/{id}',[CourserController::class, 'store_update_courser_about_description_data']);

Route::get('/add_courser_about_data/{id}',[CourserController::class, 'add_courser_about_data']);
Route::post('/store_add_courser_about_data/{id}',[CourserController::class, 'store_add_courser_about_data']);

Route::get('/delete_courser_about/{id}',[CourserController::class, 'delete_courser_about']);






Route::get('/courser_detail',[CourserController::class, 'courser_detail']);

Route::get('/update_courser_detail_description_data/{id}',[CourserController::class, 'update_courser_detail_description_data']);
Route::post('/store_update_courser_detail_description_data/{id}',[CourserController::class, 'store_update_courser_detail_description_data']);

Route::get('/add_courser_detail_data/{id}',[CourserController::class, 'add_courser_detail_data']);
Route::post('/store_add_courser_detail_data/{id}',[CourserController::class, 'store_add_courser_detail_data']);

Route::get('/delete_courser_detail/{id}',[CourserController::class, 'delete_courser_detail']);









Route::get('/courser_type',[CourserController::class, 'courser_type']);

Route::get('/add_courser_type_data/{id}',[CourserController::class, 'add_courser_type_data']);
Route::post('/store_add_courser_type_data/{id}',[CourserController::class, 'store_add_courser_type_data']);

Route::get('/delete_courser_type/{id}',[CourserController::class, 'delete_courser_type']);





Route::get('/view_course/{id}',[CourserController::class, 'view_course']);




Route::get('/sub_course_type',[CourserController::class, 'sub_course_type']);

Route::get('/add_sub_course_type_data/{id}',[CourserController::class, 'add_sub_course_type_data']);
Route::post('/store_add_sub_course_type_data/{id}',[CourserController::class, 'store_add_sub_course_type_data']);


Route::get('/update_sub_course_type_data/{id}',[CourserController::class, 'update_sub_course_type_data']);
Route::post('/store_update_sub_course_type_data/{id}',[CourserController::class, 'store_update_sub_course_type_data']);

Route::get('/delete_sub_course_type/{id}',[CourserController::class, 'delete_sub_course_type']);






Route::get('/view_sub_course/{id}',[CourserController::class, 'view_sub_course']);



Route::get('/add_course_detail_data/{id}',[CourserController::class, 'add_course_detail_data']);
Route::post('/store_add_course_detail_data/{id}',[CourserController::class, 'store_add_course_detail_data']);





Route::get('/add_course_banner_image_data/{id}',[CourserController::class, 'add_course_banner_image_data']);
Route::post('/store_add_course_banner_image_data/{id}',[CourserController::class, 'store_add_course_banner_image_data']);




Route::get('/add_sub_course_banner_image_data/{id}',[CourserController::class, 'add_sub_course_banner_image_data']);
Route::post('/store_add_sub_course_banner_image_data/{id}',[CourserController::class, 'store_add_sub_course_banner_image_data']);


Route::get('/add_sub_course_detail_data/{id}',[CourserController::class, 'add_sub_course_detail_data']);
Route::post('/store_add_sub_course_detail_data/{id}',[CourserController::class, 'store_add_sub_course_detail_data']);




Route::get('/add_sub_course_des_data/{id}',[CourserController::class, 'add_sub_course_des_data']);
Route::post('/store_add_sub_course_des_data/{id}',[CourserController::class, 'store_add_sub_course_des_data']);





/*New      New      New      New      New      New      New      New      New      New      New      New      New      New      */



Route::get('/add_course_description_data/{id}',[CourserController::class, 'add_course_description_data']);
Route::post('/store_add_course_description_data/{id}',[CourserController::class, 'store_add_course_description_data']);




Route::get('/add_sub_course_description_data/{id}',[CourserController::class, 'add_sub_course_description_data']);
Route::post('/store_add_sub_course_description_data/{id}',[CourserController::class, 'store_add_sub_course_description_data']);





Route::get('/change_visibility/{id}',[CourserController::class, 'change_visibility']);

Route::get('/category_master',[CourserController::class, 'category_master']);







/*Notes Route    Notes Route    Notes Route    Notes Route    Notes Route    Notes Route    Notes Route    Notes Route    */



Route::get('/notes',[NotesController::class, 'notes']);

Route::get('/search_notes',[NotesController::class, 'search_notes']);

Route::get('/add_notes',[NotesController::class, 'add_notes']);

Route::get('/get_category/{id}',[NotesController::class, 'get_category']);

Route::post('/store_notes',[NotesController::class, 'store_notes']);

Route::get('/view_notes_detail/{id}',[NotesController::class, 'view_notes_detail']);

Route::get('/delete_notes/{id}',[NotesController::class, 'delete_notes']);

Route::post('/delete_all_list',[NotesController::class, 'delete_all_list']);

Route::get('/update_notes/{id}',[NotesController::class, 'update_notes']);

Route::post('/store_update_notes/{id}',[NotesController::class, 'store_update_notes']);






/*Member Route   */

/*Member Route   */

Route::get('/member_list',[MemberController::class, 'member_list']);

Route::get('/member_detail/{id}',[MemberController::class, 'member_detail']);

Route::get('/export-users',[MemberController::class,'exportUsers'])->name('export-users');

Route::get('/search_student',[MemberController::class, 'search_student']);

Route::get('/active_membar',[MemberController::class, 'active_membar']);

Route::get('/Exportactivemember',[MemberController::class, 'Exportactivemember']);


Route::get('/search_active_student',[MemberController::class, 'search_active_student']);

Route::get('/past_member',[MemberController::class, 'past_member']);

Route::get('/search_past_student',[MemberController::class, 'search_past_student']);

Route::get('/Exportpastmember',[MemberController::class, 'Exportpastmember']);


Route::get('/student_category/{id}',[MemberController::class, 'student_category']);

Route::get('/edit_panding_member/{id}',[MemberController::class, 'edit_panding_member']);

Route::post('/store_panding_student/{id}',[MemberController::class, 'store_panding_student']);


Route::get('/change_status/{id}',[MemberController::class, 'change_status']);

Route::get('/edit_active_member/{id}',[MemberController::class, 'edit_active_member']);

Route::post('/store_active_student/{id}',[MemberController::class, 'store_active_student']);
Route::get('/add_new_category/{id}',[MemberController::class, 'add_new_category']);

Route::post('/assign_new_category/{id}',[MemberController::class, 'assign_new_category']);

Route::get('/assign_new_course/{id}',[MemberController::class, 'assign_new_course']);

Route::post('/store_new_course/{id}',[MemberController::class, 'store_new_course']);

Route::post('/delete_course_list',[MemberController::class, 'delete_course_list']);


Route::get('/view_student_notes/{id}',[MemberController::class, 'view_student_notes']);

Route::get('/add_student_notes/{id}',[MemberController::class, 'add_student_notes']);

Route::post('/store_student_notes/{id}',[MemberController::class, 'store_student_notes']);

Route::get('/delete_student_note/{id}',[MemberController::class, 'delete_student_note']);

Route::post('/delete_all_student_note',[MemberController::class, 'delete_all_student_note']);

Route::get('/active_panding/{id}',[MemberController::class, 'active_panding']);

Route::get('/delete_panding_student/{id}',[MemberController::class, 'delete_panding_student']);

Route::post('/delete_panding_all_student',[MemberController::class, 'delete_panding_all_student']);

Route::get('/course_status/{id}',[MemberController::class, 'course_status']);
Route::get('/change_past_status/{id}',[MemberController::class, 'change_past_status']);





/*Product Routes    Product Routes    Product Routes    Product Routes    Product Routes    Product Routes    Product Routes   */


Route::get('/search_product',[ProductController::class, 'search_product']);

Route::get('/product',[ProductController::class, 'product']);

Route::get('/add_product_data/{id}',[ProductController::class, 'add_product_data']);
Route::post('/store_add_product_data/{id}',[ProductController::class, 'store_add_product_data']);

Route::get('/delete_product/{id}',[ProductController::class, 'delete_product']);




Route::get('/product_category_banner',[ProductController::class,'product_category_banner']);




Route::get('/product_category',[ProductController::class, 'product_category']);

Route::get('/add_product_category_data/{id}',[ProductController::class, 'add_product_category_data']);
Route::post('/store_add_product_category_data/{id}',[ProductController::class, 'store_add_product_category_data']);

Route::get('/delete_product_category/{id}',[ProductController::class, 'delete_product_category']);




Route::get('/product_sub_category',[ProductController::class, 'product_sub_category']);

Route::get('/add_product_sub_category_data/{id}',[ProductController::class, 'add_product_sub_category_data']);
Route::post('/store_add_product_sub_category_data/{id}',[ProductController::class, 'store_add_product_sub_category_data']);

Route::get('/delete_product_sub_category/{id}',[ProductController::class, 'delete_product_sub_category']);




Route::get('/update_product_image/{id}',[ProductController::class, 'update_product_image']);
Route::post('/store_update_product_image/{id}',[ProductController::class, 'store_update_product_image']);

Route::get('/delete_product_image/{id}',[ProductController::class, 'delete_product_image']);


Route::get('/view_product/{id}',[ProductController::class, 'view_product']);
Route::post('/open_cat',[ProductController::class, 'open_cat']);




/*30-11-2022   New     30-11-2022   New     30-11-2022   New     30-11-2022   New     30-11-2022   New     30-11-2022   New     */


Route::get('/student_alumni_banner',[StudentAlumni::class,'student_alumni_banner']);


Route::get('/delete_student_course_list/{id}',[StudentAlumni::class, 'delete_student_course_list']);



Route::get('/student_alumni',[StudentAlumni::class, 'student_alumni']);

Route::get('/add_student_alumni_data/{id}',[StudentAlumni::class, 'add_student_alumni_data']);
Route::post('/store_add_student_alumni_data/{id}',[StudentAlumni::class, 'store_add_student_alumni_data']);

Route::get('/delete_student_alumni/{id}',[StudentAlumni::class, 'delete_student_alumni']);



Route::post('/open_course',[StudentAlumni::class, 'open_course']);


Route::get('/filter_student_alumni',[StudentAlumni::class, 'filter_student_alumni']);



/////////////////////// order routes 14-12-2022///////////////////////////////////////////////

Route::get('/order_list/{id}',[OrderController::class, 'order_list']);

Route::get('/search_order',[OrderController::class, 'search_order']);

Route::get('/change_order_status/{id}',[OrderController::class, 'change_order_status']);






});








/*Student Routes      Student Routes      Student Routes      Student Routes      Student Routes      Student Routes      */


Route::prefix('student')->group(function(){

Route::get('/logout',[Studentlogincontroller::class, 'logout']);

Route::get('/forgetpasswordview',[Studentlogincontroller::class, 'forgetpasswordview']);
Route::post('/resetpasswordlink',[Studentlogincontroller::class, 'resetpasswordlink']);

Route::get('/resetpasswordview/{id}',[Studentlogincontroller::class, 'resetpasswordview']);
Route::post('/resetpassword/{id}',[Studentlogincontroller::class, 'resetpassword']);

Route::get('/changepassword',[Studentcontroller::class, 'changepassword']);
Route::post('/updatepassword/{id}',[Studentcontroller::class, 'updatepassword']);

Route::get('/home/{id}',[Studentcontroller::class, 'home']);





/*Edit Profile     Edit Profile     Edit Profile     Edit Profile     Edit Profile     Edit Profile     */


Route::get('/edit_profile/{id}',[Studentcontroller::class, 'edit_profile'])->middleware('auth');
Route::post('/store_edit_profile/{id}',[Studentcontroller::class, 'store_edit_profile']);





Route::get('/notes_videos/{id}',[Studentcontroller::class, 'notes_videos']);

Route::get('/search_notes_videos/{id}',[Studentcontroller::class, 'search_notes_videos']);






Route::get('/notes/{id}',[Studentcontroller::class, 'notes']);

Route::get('/search_notes/{id}',[Studentcontroller::class, 'search_notes']);





Route::get('/videos/{id}',[Studentcontroller::class, 'videos']);

Route::get('/search_videos/{id}',[Studentcontroller::class, 'search_videos']);



});



Route::prefix('Buyer')->group(function(){

   Route::get('/buyer_login',[BuyerloginController::class, 'buyer_login'])->name('buyer_login');

   Route::get('/buyer_registration',[BuyerloginController::class, 'registration']);

   Route::post('/store_buyer',[BuyerloginController::class, 'store_buyer']);

   Route::post('/buyer_authenticate',[BuyerloginController::class, 'buyer_authenticate']);

   Route::get('/buyer_logout',[BuyerloginController::class, 'buyer_logout']);

   Route::get('/forget_password',[BuyerloginController::class, 'forget_password']);

   Route::post('/send_url',[BuyerloginController::class, 'send_url']);

   Route::get('/reset_password/{id}',[BuyerloginController::class, 'reset_password']);

   Route::post('/update_password/{id}',[BuyerloginController::class, 'update_password']);




});