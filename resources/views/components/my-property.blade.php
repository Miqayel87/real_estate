@props(['property'])

<tr id="bookmarkProperty{{$property->id}}">
    <td class="title-container">
        @if(count($property->images))
        <img src="{{asset('storage/resized/'.$property->images[0]->name)}}" alt="">
        @endif
        <div class="title">
            <h4><a href="{{route('property.show', $property->id)}}">{{$property->title}}</a></h4>
            <span>{{$property->zip_code}} {{$property->address}} {{$property->city}}, {{$property->state}}</span>
            <span class="table-property-price">${{$property->price}}</span>
        </div>
    </td>
    <td class="expire-date">{{$property->created_at}}</td>
    <td class="action">
        @if($property->status)
            <div class="action_container">
                <form id="deleteForm{{$property->id}}" action="{{route('property.destroy', $property->id)}}"
                      method="post">
                    @csrf
                    @method('DELETE')
                </form>
                <form id="editForm{{$property->id}}" action="{{route('property.edit', $property->id)}}"
                      method="get">
                    @csrf
                </form>
                <form id="hideForm{{$property->id}}" action="{{route('property.hide', $property->id)}}"
                      method="post">
                    @csrf
                    @method('PATCH')
                </form>
                <a onclick="submitEdit(this)" data-id = '{{$property->id}}'><i class="fa fa-pencil"></i> Edit</a>
                <a onclick="submitHide(this)" data-id = '{{$property->id}}'><i class="fa  fa-eye-slash"></i> Hide</a>
                <a onclick="submitDelete(this)" data-id = '{{$property->id}}' class="delete"><i class="fa fa-remove"></i> Delete</a>
            </div>
        @else
            <div class="action_container">
                <form id="activateForm{{$property->id}}" action="{{route('property.activate', $property->id)}}"
                      method="post">
                    @csrf
                    @method('PATCH')
                </form>
                <a onclick="submitActivate(this)" data-id = '{{$property->id}}'><i class="fa  fa-eye-slash"></i> Show</a>
            </div>
        @endif

    </td>
</tr>

