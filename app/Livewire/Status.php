<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Statu;
class Status extends Component
{
    use WithPagination;
	use WithFileUploads;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $description;
    public function render()
    {
        return view('livewire.status.view',[
            'status' => Statu::latest()->paginate(10),
            
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
		
    }

    public function store()
    {
        
		$this->validate([
		'name' => 'required',
		'description' => 'required',
		
        ]);

        Statu::create([ 
			'name' => $this-> name,
			'description' => $this-> description,
			
        ]);
        
        $this->resetInput();
		$this->dispatch('closeModal');
		session()->flash('message', 'Status Successfully created.');
    }

    public function edit($id)
    {
        $record = Statu::findOrFail($id);
        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->description = $record-> description;
	
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'description' => 'required',
      
        ]);

        if ($this->selected_id) {
			$record = Statu::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'description' => $this-> description,
		
            ]);

            $this->resetInput();
            $this->dispatch('closeModal');
			session()->flash('message', 'Status Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            Statu::where('id', $id)->delete();
        }
    }
    public function make_reservation($id)
    {
       
    }
}
