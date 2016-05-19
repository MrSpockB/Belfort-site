<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Bike;
use App\Image;
//use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }
    public function bikes()
    {
        $data = Bike::paginate(12);
        return view('admin.bikes',['bikes'=>$data]);
    }
    public function createBike()
    {
        $images = Image::all();
        $listImages = collect([]);
        foreach ($images as $image)
        {
            $listImages[$image->id] = $image->titulo;
        }
        $data = array('listImages'=> $listImages);
        return view('admin.bikes.create')->with('data', $data);
    }
    public function storeBike(Request $request)
    {
        $result = Bike::create($request->all());
        $result->slug = str_slug($result->descAX, "-");
        $result->save();
        return redirect('adminpanel/bikes')->with('message', 'Bicicleta guardada');
    }
    public function editBike($id)
    {
        $listImages = collect([]);
        $images = Image::all();
        foreach ($images as $image)
        {
            $listImages[$image->id] = $image->titulo;
        }
        $data = array('listImages'=>$listImages, 'bike' => Bike::find($id));
        return view('admin.bikes.create')->with('data', $data);
    }
    public function updateBike($id, Request $request)
    {
        $post_data = $request->all();
        // Get ID's of Images and separate them by comma
        $imagesIDsGal = explode(",",$post_data["IDSGal"]);
        $imagesIDsSld = explode(",",$post_data["IDSSld"]);
        // Remove ID's from Bike information
        unset($post_data["IDSGal"]);
        unset($post_data["IDSSld"]);
        unset($post_data["imgSldAdd"]);
        unset($post_data["imgGalAdd"]);
        // Get the Bike information and add the new data
        $bike = Bike::find($id);
        $bike->fill($post_data);
        // Clear all the relationships before adding the new ones
        $bike->imagesGaleria()->detach();
        $bike->imagesSlider()->detach();
        // Make the relationships between the images and the bike
        foreach ($imagesIDsGal as $key => $idImgGal)
        {
            $bike->imagesGaleria()->attach($idImgGal,['orden'=>$key, 'tipo' => 'galeria']);
        }
        foreach ($imagesIDsSld as $key => $idImgSld)
        {
            $bike->imagesSlider()->attach($idImgSld,['orden'=>$key, 'tipo' => 'slider']);
        }
        $bike->save();
        return redirect('adminpanel/bikes')->with('message', 'Bicicleta actualizada');
    }
    public function pages()
    {
        return view('admin.pages');
    }
    public function uploadFile(Request $request)
    {
        $filename = public_path()."\uploads\bikesExcel.xls";
        //dd($filename);
        $request->file('excel')->move(public_path()."\uploads", "bikesExcel.xls");
        $data = array();
        try 
        {
            Excel::load(public_path()."\uploads\bikesExcel.xls", function($reader)
            {

                foreach ($reader->toArray() as $row)
                {
                    if(count($row)>0)
                    {
                        $data = $row;
                    }
                    
                }
                foreach ($data as $value)
                {
                    $value['nombre'] = "Belfort ".trim($value['modelo']). " R.".$value['rodado']. " Sub.".$value['submodelo'];
                    $value['slug'] = str_slug($value['descax'], "-");
                    print_r($value);
                    Bike::firstOrCreate($value);
                }
            });
           
        }
        catch (Exception $e)
        {
            print_r($e->getMessage());

        }
    }
}
