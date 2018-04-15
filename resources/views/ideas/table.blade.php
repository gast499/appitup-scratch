<table class="table table-responsive" id="ideas-table">
    <thead>
        <tr>
            <th>Platform</th>
        <th>Title</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ideas as $idea)
        <tr>
            <td>{!! $idea->platform !!}</td>
            <td>{!! $idea->title !!}</td>
            <td>
                {!! Form::open(['route' => ['ideas.destroy', $idea->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ideas.show', [$idea->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ideas.edit', [$idea->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>