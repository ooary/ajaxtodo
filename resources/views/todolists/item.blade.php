
              <li class="list-group-item" id="todolist-{{$data->id}}">
                <h4 class="list-group-item-heading">{{$data->title}} <span class="badge">0 tasks</span></h4>
                <p class="list-group-item-text">
                  {{$data->description}}
                </p>
                <div class="buttons">
                    <a href="#" class="btn btn-info show-task-modal btn-xs" title="Manage Task">
                      <i class="glyphicon glyphicon-ok"></i>
                    </a>
                    <a href="#" class="btn btn-default btn-xs show-todolist-modal" title="Edit">
                      <i class="glyphicon glyphicon-edit"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-xs" title="Delete">
                      <i class="glyphicon glyphicon-trash"></i>
                    </a>

                </div>
              </li>