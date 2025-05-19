<div class="card shadow-md p-4 mb-4 bg-white rounded-lg">

    @if($image)

        <div class="card-image">

            <img src="{{$image}}" alt="image card">

        </div>

    @endif

    <div class="card-header">

        <h5>{{ $title }}</h5>

    </div>

    <div class="card-body">

        <p>{{ $content }}</p>

    </div>

</div>
