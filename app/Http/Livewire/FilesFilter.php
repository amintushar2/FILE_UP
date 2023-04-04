<?php

namespace App\Http\Livewire;
use Livewire\WithPagination;
use Livewire\Component;

use App\Models\FileDoc;
use DB;

class FilesFilter extends Component
{
     use WithPagination;

     protected $paginationTheme = 'bootstrap';
 
     public $orderColumn = "id";
     public $sortOrder = "desc";
     public $sortLink = '<i class="sorticon fa-solid fa-caret-up"></i>';
     public $searchTerm = "";
 
     public function updated(){
          $this->resetPage();
     }
     public function sortOrder($columnName=""){
         $caretOrder = "up";
         if($this->sortOrder == 'asc'){
              $this->sortOrder = 'desc';
              $caretOrder = "down";
         }else{
              $this->sortOrder = 'asc';
              $caretOrder = "up";
         } 
         $this->sortLink = '<i class="sorticon fa-solid fa-caret-'.$caretOrder.'"></i>';
 
         $this->orderColumn = $columnName;
 
    }
    public function render(){ 
     $file_search = DB::table('file_doc')
     ->orderby($this->orderColumn,$this->sortOrder)->select('*');
 
     if(!empty($this->searchTerm)){
 
          $file_search->orWhere('file_title','like',"%".$this->searchTerm."%");
          $file_search->orWhere('id','like',"%".$this->searchTerm."%");
      
     }
 
     $file_search = $file_search->paginate(20);
 
     return view('livewire.files-filter', [
          'file_search' => $file_search,
     ]);
 
 }
}
