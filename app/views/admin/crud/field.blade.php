@if(!isset($field["hideInEdit"]) || !$field["hideInEdit"])
<div class="form-group">
        @if($field['type'] != 'json')
        {{Form::label($field["name"], $name, array('class'=>'col-sm-2 control-label'))}}
        @else
            <div class="col-sm-2"></div>
        @endif
        <div class="col-sm-10">
            @if($field["type"] == "text")
            {{Form::text($field["name"], $data[$field["name"]], array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
            @elseif($field["type"] == "password")
            {{Form::password($field["name"], array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
            @if(!is_null($id))<span class="text-info">Laat dit veld leeg om het wachtwoord niet te veranderen</span>@endif
            @elseif($field["type"] == "radio")
            @foreach($field["options"] as $option => $value)
            <p>
            {{Form::radio($field["name"], $value, $data[$field["name"]] == $value, array("id"=>$field["name"]."_".$value))}}
            {{Form::label($field["name"]."_".$value, $option)}}
            </p>
            @endforeach
            @elseif($field["type"] == "wysiwyg")
            {{Form::textarea($field["name"], $data[$field["name"]], array("class"=>"ckeditor"))}}
            @elseif($field["type"] == "textarea")
            {{Form::textarea($field["name"], $data[$field["name"]], array("class"=>"form-control"))}}
            @elseif($field["type"] == "file")
             @if($editing && !empty($data[$field['name']]) )

                <?php
                      $uploader = 'Upload';
                      if( array_key_exists( 'uploader', $field ) ){
                         $uploader = $field['uploader'];
                      }

                      $class = "\\Fairtrade\\Upload\\".$uploader;
                      $upload = new $class($field['name']);
                ?>

                <img src="{{URL::asset($upload->getPath().'/'.$data[$field['name']])}}" />
             @endif
                 {{Form::file($field["name"])}}


            @elseif($field["type"] == "date")
            <div class='input-group datepicker' data-date-format="DD-MM-YYYY HH:MM:SS">
                {{Form::text($field["name"], \Fairtrade\Date::input($data[$field["name"]])->forHuman(), array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </div>
            @elseif($field['type'] === 'text-with-prepend')
                <div class="input-group">
                  <span class="input-group-addon">{{$field['prepend']}}</span>
                  {{Form::text($field["name"], $data[$field["name"]], array("class"=>"form-control", "id"=>$field["name"], "placeholder"=>$name))}}
                </div>
            @elseif($field['type'] === 'checkbox')
                <?php $checked = ( $data[ $field['name'] ] == 1) ? true : false ?>
               {{ Form::checkbox($field['name'], 1, $checked) }}

            @elseif($editing && $field['type'] == 'json')
                <h2>{{$name}}</h2>

            @elseif($field['type'] == 'select')
                <select name="{{$field['name']}}" class="form-control">
                    @foreach($field['options'] as $option)
                        <option @if($editing && $data[$field['name']] == $option['id']) selected @endif value="{{$option['id']}}">{{$option['title']}}</option>
                    @endforeach
                </select>
            @endif

        </div>
    </div>
@endif