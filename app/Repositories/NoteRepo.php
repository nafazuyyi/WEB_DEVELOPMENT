<?php

namespace App\Repositories;

use App\Models\Note;

class NoteRepo {

    public function createNote($data)
    {
        return Note::create($data);
    }
    public function getNote($where)
    {
        return Note::where($where);
    }
    public function getNoteByUserId($st_id)
    {
        return $this->getNote(['user_id' => $st_id])->get();
    }
    public function deleteNote($id)
    {
        return Note::destroy($id);
    }
}
