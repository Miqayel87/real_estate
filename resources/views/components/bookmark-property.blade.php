@props(['property'])

<tr id="bookmarkProperty{{$property->id}}">
    <td class="title-container">
{{--        <img src="{{asset('storage/resized/'.count($property->images)?$property->images[0]->name:'')}}" alt="">--}}
        <div class="title">
            <h4><a href="{{route('property.show', $property->id)}}">{{$property->title}}</a></h4>
            <span>{{$property->zip_code}} {{$property->address}} {{$property->city}}, {{$property->state}}</span>
            <span class="table-property-price">${{$property->price}}</span>
        </div>
    </td>
    <td class="action">
        <a data-id="{{$property->id}}" class="bookmark-liked delete"><i class="fa fa-remove"></i> Remove</a>
    </td>
</tr>
