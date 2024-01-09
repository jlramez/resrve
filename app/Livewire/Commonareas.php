<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\commonarea;

class Commonareas extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $description, $capacity;
    public function render()
    {
        return view('livewire.commonareas.view',[
            'commonareas' => commonarea::latest()->paginate(10),
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
}
