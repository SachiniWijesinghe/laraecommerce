<?php







namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;


use App\Http\Requests\CategoryFormRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    public function catfunction(){
        return view('admin.category.cat');
    }






    public function catcreatefunction(){
        return view('admin.category.createCategory');
    }






    public function saveCategory(CategoryFormRequest $request){

       $validatedData = $request->validated();

       $category = new Category;

      

       $category->slug = Str::slug($validatedData['slug']);

       if($request->hasFile('image')){
        $file = $request->file('image');

        $ext = $file->getClientOriginalExtension();
                      
        $filename = time().'.'.$ext;

        $file->move('uploads/category/',$filename);
        $category->image =$filename;
       }

       $category->name = $validatedData['catname'];
       $category->description = $validatedData['description'];
       $category->meta_title = $validatedData['metatile'];
       $category->meta_keyword = $validatedData['metakeyword'];
       $category->meta_description = $validatedData['metadescription'];

       $category->status = $request->status ==true?'1':'0';

       $category->save();

       return redirect('admin/category')->with('message','Category Added Successfully');
  
    }


      
    public function edit(Category $category){
        
        return view('admin.category.edit',compact('category'));
    }



    public function update(CategoryFormRequest $request, $category){

        $validatedData = $request->validated();
        $category = Category::findOrFail($category);

        $category->slug = Str::slug($validatedData['slug']);

       if($request->hasFile('image')){

        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }

        $file = $request->file('image');
        $ext = $file->getClientOriginalExtension();
        $filename = time().'.'.$ext;
        $file->move('uploads/category/',$filename);
        $category->image =$filename;
       }

       $category->name = $validatedData['catname'];
       $category->description = $validatedData['description'];
       $category->meta_title = $validatedData['metatile'];
       $category->meta_keyword = $validatedData['metakeyword'];
       $category->meta_description = $validatedData['metadescription'];

       $category->status = $request->status ==true?'1':'0';

       $category->update();

       return redirect('admin/category')->with('message','Category Updated Successfully');
    }

   

}
