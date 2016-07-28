           


 	        {{Form::model($todolists,[
 	        	'route'=> $todolists -> exists ? ['todolists.update',$todolists->id] : 'todolists.store',
 	        	'method'=> $todolists -> exists ? 'PUT' :'POST'
 	        	])}}
                    <div class="form-group">
                      <label for="" class="control-label">Title Task List Name</label>
                      {{Form::text('title',null,['class'=>'form-control input-lg'])}}
                    </div>
                     <div class="form-group">
                      <label for="" class="control-label">Description</label>
                      {{Form::textarea('description',null,['class'=>'form-control','id'=>'description','rows'=>2])}}
                    </div>
            {{Form::close()}}