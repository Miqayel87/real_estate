@props(['property', 'listingTypes'])

<div class="listing-item">

    <a href="{{route('property.show', $property->id)}}" class="listing-img-container">

        <div class="listing-badges">
            <span class="featured">Featured</span>
            <span>{{$listingTypes[$property->listing_type]}}</span>
        </div>
        <div class="listing-img-content">
            <span class="listing-price">${{$property->price}} <i>${{number_format($property->price/$property->features[array_search('Area', array_column($property->features->toArray(), 'name'))]->pivot->value, 2)}} / sq ft</i></span>
            @if(Auth::user())
                @if(array_search($property->id, array_column(Auth::user()->bookmarks->toArray(), 'property_id')) !== false)
                    <span data-id="{{$property->id}}" class="bookmark like-icon with-tip liked"
                          data-tip-content="Add to Bookmarks"></span>
                @else
                    <span data-id="{{$property->id}}" class="bookmark like-icon with-tip"
                          data-tip-content="Delete from Bookmarks"></span>
                @endif
            @endif
        </div>

        <div class="listing-carousel">
            @foreach($property->images as $image)
                <div><img src="{{asset('storage/resized/'.$image->name)}}" alt=""></div>
            @endforeach
        </div>
    </a>

    <div class="listing-content">
        <div class="listing-title">
            <h4><a href="{{route('property.show', $property->id)}}">{{$property->title}}</a></h4>
            <a
               class="listing-address popup-gmaps">
                <i class="fa fa-map-marker"></i>
                {{$property->zip_code}} {{$property->address}} {{$property->city}}
                , {{$property->state}}
            </a>

            <a href="{{route('property.show', $property->id)}}" class="details button border">Details</a>
        </div>

        <ul class="listing-details">
            @foreach($property->features as $feature)
                @if($feature->has_value && $feature->pivot->value)
                    <li>{{$feature->pivot->value}} {{$feature->name}} </li>
                @endif
            @endforeach
        </ul>

        <div class="listing-footer">
            <a href="#"><i class="fa fa-user"></i> {{$property->user->username}}</a>
            <span><i class="fa fa-calendar-o"></i> {{\App\Helpers\DateTimeHelper::diff($property->created_at)}}</span>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>


