
@foreach ($books as $book)
<p>
    naslov knjige:{{$book->title}}
</p>

<p>
    kategorija: {{$book->category->name}}
</p>
@endforeach