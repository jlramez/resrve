<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Evento;
use App\Models\User;
use App\Models\File;
use App\Models\Commonarea;
use Carbon\carbon;

class Eventos extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $description, $capacity, $file;
    public function render()
    {
        return view('livewire.eventos.view',[
            'eventos' => Evento::where('users_id', auth()->user()->id)->latest()->paginate(10),
            'users' => User::all(),
            'commonareas' => Commonarea::all(),
        ]);
    }
    public function cancel()
    {
        $this->resetInput();
    }
	
    private function resetInput()
    {		
		$this->name = null;
		$this->description = null;
		$this->capacity = null;
    }

    public function store()
    {
        
		$this->validate([
		'name' => 'required',
		'description' => 'required',
		'capacity' => 'required',
        ]);

        commonarea::create([ 
			'name' => $this-> name,
			'description' => $this-> description,
			'capacity' => $this-> capacity,
        ]);
        
        $this->resetInput();
		$this->dispatch('closeModal');
		session()->flash('message', 'Common area Successfully created.');
    }

    public function edit($id)
    {
        $record = Commonarea::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->description = $record-> description;
		$this->capacity = $record-> capacity;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
            'capacity' => 'required',
        ]);

        if ($this->selected_id) {
			$record = commonarea::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'description' => $this-> description,
			'capacity' => $this-> capacity,
            ]);

            $this->resetInput();
            $this->dispatch('closeModal');
			session()->flash('message', 'Common area Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            commonarea::where('id', $id)->delete();
        }
    }
    public function make_reservation($id)
    {
       
    }
    public function attach($id)
    {
        $record = Evento::findOrFail($id);
        $this->selected_id = $id; 

    }
    public function save()
    {
        $this->validate(
            [
                'file.*' => 'required|mimes:pdf',
            ]);
       // dd($this->archivos);
       // foreach($this->archivos as $key=>$file)
        //{
		if ($this->file)
			{	
					$evento=Evento::find($this->selected_id);
					//$folio=$promocion->folio;
					$year=carbon::parse(now())->format('Y');
					$file_save=new File();
					$file_save->file_name=$this->file->getClientOriginalName();
					$file_save->file_extension=$this->file->extension();
					$path=$this->file->store('receipts/');			
					$file_save->file_path='storage/'.$path;
					$file_save->save();
					$file_id=File::find(File::max('id'))->id;
					//dd($archivo_id);
					if($file_id)
					{
						$evento->files_id= $file_id;
						$evento->users_id= auth()->user()->id;
                        $evento->status_id= '1';
						$evento->save(); 
						
						$this->archivo=null;
						session()->flash('message', 'File attached succesfully.');
						return redirect()->route('eventos.index');
					}
					else
					{
						session()->flash('message', 'ERROR !! File couldnt be  attached .');
						return redirect()->route('eventos.index');
						
						$this->archivo=null;

					}
			}
			else
					{
						session()->flash('message', 'ERROR !! Archivo No adjuntado .');
						return redirect()->route('eventos.index');
						
						$this->archivo=null;

					}
    }
}