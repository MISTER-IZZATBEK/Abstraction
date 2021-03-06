<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;

class AbstractService
{
    public function index()
    {
        return $this->model::all();
    }

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function store(array $data)
    {
        //validate
        //get fields
        $fields=$this->getFields();
        $rules=[];
        foreach ($fields as $field)
        {
            $rules[ $field->getName()]=$field->getRules();
        }
        $validator=Validator::make($data, $rules);
        if($validator->fails())
        {
            dd($validator->errors());
        }
        $data=$validator->validated();
        $object=new $this->model;
        foreach($fields as $field)
        {
            $field->fill($object, $data);
        }
        $object->save();
        return $object;
    }

    public function update(array $data, $id)
    {
        $item=$this->show($id);
        $fields=$this->getFields();
        $rules=[];
        foreach ($fields as $field)
        {
            $rules[ $field->getName()]=$field->getRules();
        }
        $validator=Validator::make($data, $rules);
        if($validator->fails())
        {
            dd($validator->errors());
        }
        $data=$validator->validated();
        foreach($fields as $field)
        {
            $field->fill($item, $data);
        }
        $item->update($data);
        return $item;
    }

    public function getFields()
    {
        return[];
    }
}
