<?php

use App\Http\Controllers\SingleBlogController;
use App\Http\Controllers\SinglePortfolioController;
use App\Http\Controllers\TestController;
use App\Models\Home;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\HomeBlogController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\AboutAuthorController;
use App\Http\Controllers\AboutPhotoController;
use App\Http\Controllers\BlogPhotoController;
use App\Http\Controllers\ContactPhotoController;
use App\Http\Controllers\LinkController;

use App\Http\Controllers\HomeBackendController;
use App\Http\Controllers\HomeContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\HomePortfolioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $home = Home::all();
    return view('home.index', compact('home'));
});


Route::get('/admin', [AdminController::class, 'index'])->middleware('auth:admin')->name('index.admin');

Route::get('/add-portfolio', [PortfolioController::class, 'add_portfolio'])->name('add_portfolio');

// Route::get('/add-portfolio', [PortfolioController::class, 'add_portfolio'])->name('add_portfolio');




Route::post('/portfolio-create', [PortfolioController::class, 'create_portfolio'])->name('portfolio');


Auth::routes();


Route::post('password',[SettingsController::class,'changePassword'])->name('password');

Route::get('/change-password',[SettingsController::class,'view'])->name('change-password');

Route::post('/change-details', [SettingsController::class, 'change_details'])->name('change-details');





Route::get('/details', [SettingsController::class, 'show'])->name('details');









Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/view-portfolio',[PortfolioController::class, 'view_portfolio'])->name('view-portfolio');

Route::delete('delete/{id}', [PortfolioController::class, 'delete_portfolio'])->name('delete-portfolio');

Route::get('/edit-portfolio/{id}', [PortfolioController::class, 'edit_portfolio'])->name('edit-portfolio');


Route::post('/update-portfolio/{id}',[PortfolioController::class,'update_portfolio'])->name('update-portfolio');


Route::get('/blog-shows',[BlogController::class, 'view'])->name('blog');

Route::post('/add-blog', [BlogController::class, 'add_blog'])->name('add-blog');

Route::get('/view-blog', [BlogController::class, 'view_blog'])->name('view-blog');

Route::get('/edit-blog/{id}', [BlogController::class, 'edit_blog'])->name('edit-blog');

Route::post('/update-blog/{id}', [BlogController::class, 'update_blog'])->name('update-blog');


Route::delete('/delete-blog/{id}', [BlogController::class, 'delete_blog'])->name('delete-blog');



Route::get('/add-testimonials', [TestimonialController::class, 'show'])->name('testimonials');

Route::post('/add-testimonials', [TestimonialController::class, 'add_testimonial'])->name('add-testimonials');

Route::get('/view-testimonials', [TestimonialController::class, 'view_testimonial'])->name('view-testimonials');

Route::get('/edit-testimonials/{id}', [TestimonialController::class, 'edit_testimonial'])->name('edit-testimonials');

Route::post('/update-testimonials/{id}', [TestimonialController::class, 'update_testimonial'])->name('update-testimonial');

Route::delete('/delete-testimonials/{id}', [TestimonialController::class, 'delete_testimonial'])->name('delete-testimonial');


// Route::get('/show-details',[SettingsController::class, 'show_details'])->name('show-details');

Route::get('/show-details', [SettingsController::class, 'show_details'])->name('show-details');

Route::get('/admin-details', [SettingsController::class, 'admin_details'])->name('admin-details');

Route::get('/portfolio-view', [HomePortfolioController::class, 'portfolio_view'])->name('view-home-portfolio');

// Route::get('/about-us-view', [HomeAboutController::class, 'about_us'])->name('about-us-nav');

Route::get('/about-us-view', [HomeAboutController::class, 'about_us'])->name('about-us');



Route::get('/contact-us', [HomeContactController::class, 'contact_us'])->name('contact-us');

Route::get('/home-blog', [HomeBlogController::class, 'home_blog'])->name('home-blog');



Route::get('/add-details-home', [HomeBackendController::class, 'about_us'])->name('about-us-photo');
Route::post('/add-details-home-photo', [HomeBackendController::class, 'add_photo'])->name('about-us-add-photo');

Route::get('/view-home-photo',[HomeBackendController::class, 'view_photo'])->name('view-home-photo');
Route::get('/home-photo-edit/{id}', [HomeBackendController::class, 'edit_photo'])->name('edit-home-photo');
Route::post('/home-update-photo/{id}',[HomeBackendController::class, 'update_photo'])->name('update-home-photo');

Route::get('/about-us',[AboutController::class, 'add_about'])->name('about-us-details');

Route::post('/about-us-details',[AboutController::class, 'add_about_details'])->name('add-about-details-task');

Route::delete('/delete-home-photo/{id}',[HomeBackendController::class, 'delete_photo'])->name('delete-home-photo');

Route::get('/about-view-photo-details',[AboutController::class, 'view_about'])->name('view-about-photo');

Route::get('/edit-about-detailss/{id}',[AboutController::class, 'edit_about'])->name('edit-about-photo');

Route::post('/update-about-details/{id}',[AboutController::class, 'update_about'])->name('update-about-details');

Route::delete('/delete-about-details/{id}',[AboutController::class, 'delete_about'])->name('delete-about-photo');


Route::get('/add-team-members', [TeamController::Class, 'show_team'])->name('add-team-members');

Route::post('/add-team', [TeamController::class, 'add_team'])->name('add-team');

Route::get('/view-team-members', [TeamController::class, 'view_team'])->name('view-team-members');
Route::get('/edit-team/{id}', [TeamController::class, 'edit_team'])->name('edit-team');
Route::post('/update-team/{id}', [TeamController::class, 'update_team'])->name('update-team');

Route::delete('/delete-team/{id}', [TeamController::class, 'delete_team'])->name('delete-team');

Route::get('/show-service', [ServiceController::class, 'show_service'])->name('show-service');

Route::post('/add-service', [ServiceController::class, 'add_service'])->name('add-service');
Route::get('/view-service', [ServiceController::class, 'view_service'])->name('view-service');

Route::get('/edit-service/{id}', [ServiceController::class, 'edit_service'])->name('edit-service');

Route::post('/update-service/{id}',[ServiceController::class, 'update_service'])->name('update-service');

Route::delete('/delete-service/{id}',[ServiceController::class, 'delete_service'])->name('delete-service');

Route::get('/show-contacts', [ContactController::class, 'show_contact'])->name('show-contacts');
Route::post('/add-contacts', [ContactController::class, 'add_contact'])->name('add-contacts');


Route::get('/view-contacts', [ContactController::class, 'view_contact'])->name('view-contacts');

Route::get('/edit-contacts/{id}', [ContactController::class, 'edit_contact'])->name('edit-contact');

Route::post('/update-contacts/{id}', [ContactController::class, 'update_contact'])->name('update-contact');

Route::delete('/delete-contact/{id}', [ContactController::class, 'delete_contact'])->name('delete-contact');

Route::post('/send-messages', [MessageController::class, 'send_message'])->name('send-message');

Route::get('/add-about-author', [AboutAuthorController::class, 'show_aboutAuthor'])->name('add-about-author');

Route::post('/add-about-authors', [AboutAuthorController::class, 'add_aboutAuthor'])->name('add-about-authors');

Route::get('/view-about-author', [AboutAuthorController::class, 'view_aboutAuthor'])->name('view-about-author');

Route::get('/edit-about-author/{id}', [AboutAuthorController::class, 'edit_aboutAuthor'])->name('edit-about-author');
Route::get('/blog-show', [HomeBlogController::class, 'blog_show'])->name('blog.show');
Route::get('/view-single-portfolio/{id}', [SinglePortfolioController::class, 'view_singlePortfolio'])->name('view-single-portfolio');

Route::get('/view-single-blog/{id}', [SingleBlogController::class, 'view_singleBlog'])->name('view-single-blog');

// Route::get('/test-view', [TestController::class, 'view_test'])->name('view-test');

Route::get('/add-about-photo-extra', [AboutPhotoController::class, 'show_about_photo'])->name('add-about-photo-extra');


Route::post('/add-about-photo-extra', [AboutPhotoController::class, 'create'])->name('add-about-extra-photos');

Route::get('/view-about-photo-extra', [AboutPhotoController::class, 'view_about_photo'])->name('view-about-photo-extra');

Route::get('/edit-about-extra-photo/{id}', [AboutPhotoController::class, 'edit_photo'])->name('edit-about-extra-photo');

Route::post('/update-about-photo-extra/{id}', [AboutPhotoController::class, 'update_photo'])->name('update-about-photo-extra');

Route::delete('/delete-about-extra-photo/{id}', [AboutPhotoController::class, 'delete_photo'])->name('delete-about-extra-photo');

Route::get('/add-blog-photo-extra', [BlogPhotoController::class, 'view_blogPhoto'])->name('add-blog-photo-extra');
Route::post('/add-blog-photo-extras', [BlogPhotoController::class, 'create'])->name('add-blog-extras-photo');
Route::get('/view-blog-photo-extra', [BlogPhotoController::class, 'show_blogPhoto'])->name('view-blog-photo-extra');
Route::get('/edit-blog-extra-photo/{id}', [BlogPhotoController::class, 'edit_blogPhoto'])->name('edit-blog-extra-photo');
Route::post('/update-blog-photo-extra/{id}', [BlogPhotocontroller::class, 'update_blogPhoto'])->name('update-blog-photo-extra');
Route::delete('/delete-blog-extra-photo/{id}', [BlogPhotoController::class, 'delete_blogPhoto'])->name('delete-blog-extra-photo');


Route::get('/add-contacts-photo-extra', [ContactPhotoController::class, 'view'])->name('add-contacts-photo-extra');
Route::post('/add-photo-contact-extra', [ContactPhotoController::class, 'create'])->name('add-photo-contact-extra');
Route::get('/view-contacts-photo-extra', [ContactPhotoController::class, 'view_contactPhoto'])->name('view-contacts-photo-extra');
Route::get('/edit-contact-extra-photo/{id}', [ContactPhotoController::class, 'edit_contactPhoto'])->name('edit-contact-extra-photo');
Route::post('update-contact-photo-extra/{id}',[ContactPhotoController::class, 'update_contactPhoto'])->name('update-contact-photo-extra');
Route::delete('/delete-contact-extra-photo/{id}', [ContactPhotoController::class, 'delete_contactPhoto'])->name('delete-contact-extra-photo');


Route::get('/add-contacts-link', [LinkController::class, 'view'])->name('add-contacts-link');
Route::post('/add-link-contact-extra', [LinkController::class, 'create'])->name('add-link-contact-extra');
Route::get('/view-contacts-link', [LinkController::class, 'show'])->name('view-contacts-link');
Route::get('/edit-contact-clink/{id}', [LinkController::Class, 'edit'])->name('edit-contact-clink');
Route::post('/update-contact-link/{id}', [LinkController::class, 'update'])->name('update-contact-link');
Route::delete('/delete-contact-link/{id}', [LinkController::class, 'delete'])->name('delete-contact-link');
Route::get('/about_photo/{id}', [AboutController::class, 'show_single_about_photo'])->name('show_single_about_photo');








