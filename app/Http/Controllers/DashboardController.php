<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Location;
use App\Models\Category;
use App\Models\PricingPlan;
use App\Models\Testimonial;
use App\Models\Media;
use App\Models\Page;
use App\Models\User;
use App\Models\Contact;
use Flasher\Prime\FlasherInterface;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }

    public function properties(){
        $properties = Property::latest()->paginate(20);
        return view('admin.properties',['properties' => $properties]);
    }

    public function addProperty(){
        $locations = Location::all();
        return view('admin.property.add',['locations' => $locations]);
    }

    public function validateProperty(){
        return [
            'name' => 'required',
            'name_tr' => 'required',
            'location_id' => 'required',
            'price' => 'required|integer',
            'status' => 'integer',
            'type' => 'integer',
            'bedrooms' => 'integer',
            'bathrooms' => 'integer',
            'net_sqm' => 'integer',
            'gross_sqm' => 'integer',
            'pool' => 'integer',
            'overview' => 'required',
            'overview_tr' => 'required',
            'why_buy' => 'required',
            'why_buy_tr' => 'required',
            'description' => 'required',
            'description_tr' => 'required'
        ];
    }

    public function saveOrUpdateProperty($property,$request){
        $property->name = $request->name;
        $property->name_tr = $request->name_tr;


       // dd(time().'-'.$request->featured_image->getClientOriginalName());

        $featured_image_name = time().'-'.$request->featured_image->getClientOriginalName();

        $request->featured_image->storeAs('public/uploads',$featured_image_name);

        $property->featured_image = $featured_image_name;

        foreach($request->gallery_images as $image){
            $gallery_image_name = time().'-'.$image->getClientOriginalName();
            $image->storeAs('public/uploads',$gallery_image_name);
            $media = new Media();
            $media->name = $gallery_image_name;
            $media->property_id = $property->id;
            $media->save();
        }

        $property->location_id = $request->location_id;
        $property->price = $request->price;
        $property->status = $request->status;
        $property->type = $request->type;
        $property->bedrooms = $request->bedrooms;
        $property->bathrooms = $request->bathrooms;
        $property->net_sqm = $request->net_sqm;
        $property->gross_sqm = $request->gross_sqm;
        $property->pool = $request->pool;
        $property->overview = $request->overview;
        $property->overview_tr = $request->overview_tr;
        $property->why_buy = $request->why_buy;
        $property->why_buy_tr = $request->why_buy_tr;
        $property->description = $request->description;
        $property->description_tr = $request->description_tr;

        $property->save();
    }

    public function createProperty(Request $request){

        $update_validation = $this->validateProperty()[] = [
            'featured_image' => 'required|image',
            'gallery_images' => 'required',
        ];

        $request->validate($update_validation);

        $property = new Property();
        $this->saveOrUpdateProperty( $property,$request);

        return redirect(route('dashboard-properties' ))->with(['message' => 'Property is added.']);

    }


    public function updteProperty($property_id,Request $request){


        $property = Property::findOrFail($property_id);
        $request->validate($this->validateProperty());


        $this->saveOrUpdateProperty( $property,$request);

        return redirect(route('dashboard-properties' ))->with(['message' => 'Property Updated.']);

    }

    public function editProperty($property_id){
        $property = Property::findOrFail($property_id);
        $locations = Location::all();
        return view('admin.property.edit',[
            'property' => $property,
            'locations' => $locations
        ]);
    }

    public function deleteProperty($property_id){

        $property = Property::findOrFail($property_id);
        Storage::delete('public/uploads/'.$property->featured_image);
        foreach($property->gallery as $media){
            $media = Media::findOrFail($media->id);
            // delete the file
            Storage::delete('public/uploads/'.$media->name);
            $media->delete();
        }

        // remove row
        $property->delete();

        return redirect(route('dashboard-properties' ))->with(['message' => 'Property is deleted.']);
    }

    public function saveOrUpdateCatLoc($taxonomy,$request){
        $taxonomy->name = $request->name;
        $taxonomy->save();
    }

    public function categories(){
        $categories = Category::latest()->paginate(20);
        return view('admin.categories',['categories' => $categories]);
    }

    public function addCategory(){
        return view('admin.category.add');
    }

    public function createCategory(Request $request){

        $request->validate(
            ['name' => 'required']
        );

        $category = new Category();

        $this->saveOrUpdateCatLoc($category, $request);

        return redirect(route('dashboard-categories' ))->with(['message' => 'Category is added.']);
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);

        return view('admin.category.edit',[
            'category' => $category
        ]);
    }

    public function updteCategory($id,Request $request){
        $category = Category::findOrFail($id);
        $request->validate(
            ['name' => 'required']
        );
        $this->saveOrUpdateCatLoc($category, $request);
        return redirect(route('dashboard-categories' ))->with(['message' => 'Category Updated.']);
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);
        // remove row
        $category->delete();

        return redirect(route('dashboard-categories' ))->with(['message' => 'Category is deleted.']);
    }


    public function pricing(){
        $pricing_list = PricingPlan::latest()->paginate(20);
        return view('admin.pricing',['pricing_list' => $pricing_list]);
    }

    public function addPricing(){
        return view('admin.pricing.add');
    }


    public function saveOrUpdatePricing($pricing,$request){
        $pricing->name = $request->name;
        $pricing->price = $request->price;
        $pricing->description = $request->description;
        $pricing->features = $request->features;
        $pricing->save();
    }

    public function createPricing(Request $request){
        $request->validate(
            ['name' => 'required'],
            ['price' => 'required'],
            ['description' => 'required'],
            ['features' => 'required']
        );

        $pricing = new PricingPlan();

        $this->saveOrUpdatePricing($pricing, $request);

        return redirect(route('dashboard-pricingplan' ))->with(['message' => 'Pricing is added.']);
    }


    public function editPricing($id){
        $pricing = PricingPlan::findOrFail($id);

        return view('admin.pricing.edit',[
            'pricing' => $pricing
        ]);
    }

    public function updtePricing($id,Request $request){

        $pricing = PricingPlan::findOrFail($id);

        $request->validate(
            ['name' => 'required'],
            ['price' => 'required'],
            ['description' => 'required'],
            ['features' => 'required']
        );
        $this->saveOrUpdatePricing($pricing, $request);

        return redirect(route('dashboard-pricingplan' ))->with(['message' => 'Pricing is Updated.']);
    }


    public function deletePricing($id){
        $pricing = PricingPlan::findOrFail($id);
        // remove row
        $pricing->delete();

        return redirect(route('dashboard-pricingplan' ))->with(['message' => 'Pricing Plan is deleted.']);
    }

    public function pages(){
        $pages = Page::latest()->paginate(20);
        return view('admin.pages',['pages' => $pages]);
    }

    public function users(){
        $users = User::latest()->paginate(20);
        return view('admin.users',['users' => $users]);
    }

    public function addLocation(){
        return view('admin.location.add');
    }

    public function locations(){
        $locations = Location::latest()->paginate(20);
        return view('admin.locations',['locations' => $locations]);
    }

    public function createLocation(Request $request){
        $request->validate(
            ['name' => 'required']
        );

        $location = new Location();

        $this->saveOrUpdateCatLoc($location, $request);

        return redirect(route('dashboard-locations' ))->with(['message' => 'Location is added.']);
    }

    public function editLocation($id){
        $location = Location::findOrFail($id);

        return view('admin.location.edit',[
            'location' => $location
        ]);
    }

    public function updteLocation($id,Request $request){
        $location = Location::findOrFail($id);
        $this->saveOrUpdateCatLoc($location, $request);

        return redirect(route('dashboard-locations' ))->with(['message' => 'Location Updated.']);
    }

    public function deleteLocation($id){
        $location = Location::findOrFail($id);
        // remove row
        $location->delete();

        return redirect(route('dashboard-locations' ))->with(['message' => 'Location is deleted.']);
    }



    public function testimonials(){
        $testimonials = Testimonial::latest()->paginate(20);
        return view('admin.testimonials',['testimonials' => $testimonials]);
    }

    public function addTestimonial(){
        return view('admin.testimonial.add');
    }

    public function createTestimonial(Request $request){
        $request->validate(
            ['name' => 'required'],
            ['designation' => 'required'],
            ['review' => 'required']
        );

        $testimonial = new Testimonial();
        $testimonial->name =  $request->name;
        $testimonial->designation =  $request->designation;
        $testimonial->review =  $request->review;
        $testimonial->image =  'image url';
        $testimonial->save();

        return redirect(route('dashboard-testimonials' ))->with(['message' => 'Testimonial is added.']);
    }

    public function editTestimonial($id){
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonial.edit',[
            'testimonial' => $testimonial
        ]);
    }

    public function updteTestimonial($id,Request $request){
        $request->validate(
            ['name' => 'required'],
            ['designation' => 'required'],
            ['review' => 'required']
        );

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->name =  $request->name;
        $testimonial->designation =  $request->designation;
        $testimonial->review =  $request->review;
        $testimonial->image =  'image url';
        $testimonial->save();

        return redirect(route('dashboard-testimonials' ))->with(['message' => 'Testimonial is Updated.']);
    }


    public function deleteTestimonial($id){
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();
        return redirect(route('dashboard-testimonials' ))->with(['message' => 'Testimonial is Deleted.']);
    }

    public function addPage(){
        return view('admin.page.add');
    }

    public function createPage(Request $request){
        $request->validate(
            ['name' => 'required']
        );

        $page = new Page();
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->save();

        return redirect(route('dashboard-pages' ))->with(['message' => 'Page is added.']);
    }

    public function editPage($id){
        $page = Page::findOrFail($id);

        return view('admin.page.edit',[
            'page' => $page
        ]);
    }

    public function updtePage($id,Request $request){
        $page = Page::findOrFail($id);
        $page->name = $request->name;
        $page->slug = $request->slug;
        $page->content = $request->content;
        $page->save();

        return redirect(route('dashboard-pages' ))->with(['message' => 'Page Updated.']);
    }

    public function deletePage($id, FlasherInterface $flasher){
        $page = Page::findOrFail($id);
        // remove row
        $page->delete();

        $flasher->addSuccess('Page has been deleted');
        return redirect(route('dashboard-pages' ))->with(['message' => 'Page is deleted.']);
    }


    public function messages(){
        $messages = Contact::latest()->paginate(20);
        return view('admin.messages',['messages' => $messages]);
    }

    public function deleteMessages($id){
        $messages = Contact::findOrFail($id);
        $messages->delete();
        return redirect(route('dashboard-messages' ))->with(['message' => 'Message is deleted.']);
    }

}

