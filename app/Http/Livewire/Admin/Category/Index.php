<?php

namespace App\Http\Livewire\Admin\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Support\Facades\File; 
class Index extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    

    public $category_id;

    public function deleteCategory($category_id){
        //dd($category_id); dd- dump and die.uncomment and click delete to check id is passed
        $this->category_id = $category_id;
    }
    public function destroyCategory(){
        $category = Category :: find($this->category_id);
        $path = 'uploads/category/'.$category->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $category -> delete();
        session()->flash('message','Category Deleted');
    }


    public function render()
    {
        $categories = Category::orderBy('id','DESC')->paginate(5);
        return view('livewire.admin.category.index',['categories'=>$categories]);
    }
}
