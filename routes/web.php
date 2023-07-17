<?php

use App\Http\Controllers\SingleBlogController;
use App\Http\Controllers\SinglePortfolioController;
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






