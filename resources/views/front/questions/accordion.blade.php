<div class="accordion" id="accordionExample">
    @foreach($questions as $question)
    <div class="card">
        <div class="card-header" id="heading{{ $question->id }}">
            <h2 class="mb-0">
                <button class="btn btn-link text-left" type="button" data-toggle="collapse" data-target="#collapse{{ $question->id }}" aria-expanded="true" aria-controls="collapse{{ $question->id }}">
                    {{ $question->title }}
                </button>
            </h2>
        </div>

        <div id="collapse{{ $question->id }}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                {{ $question->description }}
                <div class="">
                    <a href="{{ url('questions/' . $question->id) }}">Ссылка на вопрос</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
