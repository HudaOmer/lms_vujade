@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Edit Book
        </div>
        <h2>Edit Book Details</h2>
        <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST">
            @csrf
            @method('PUT') <!-- Use PUT method for updating -->
            
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="{{ old('name', $book->name) }}" required><br><br>
            
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" value="{{ old('author', $book->author) }}" required><br><br>
            
            <label for="publisher">Publisher:</label><br>
            <input type="text" id="publisher" name="publisher" value="{{ old('publisher', $book->publisher) }}" required><br><br>
            
            <label for="language">Language:</label><br>
            <input type="text" id="language" name="language" value="{{ old('language', $book->language) }}" required><br><br>
            
            <label for="edition">Edition:</label><br>
            <input type="text" id="edition" name="edition" value="{{ old('edition', $book->edition) }}"><br><br>
            
            <label for="category">Category:</label><br>
            <select id="category" name="category" required>
                <option value="">Select a category</option>
                <option value="Fiction (General)" {{ old('category', $book->category) === 'Fiction (General)' ? 'selected' : '' }}>Fiction (General)</option>
                <option value="Fiction (Romance)" {{ old('category', $book->category) === 'Fiction (Romance)' ? 'selected' : '' }}>Fiction (Romance)</option>
                <option value="Fiction (Science Fiction)" {{ old('category', $book->category) === 'Fiction (Science Fiction)' ? 'selected' : '' }}>Fiction (Science Fiction)</option>
                <option value="Fiction (Historical)" {{ old('category', $book->category) === 'Fiction (Historical)' ? 'selected' : '' }}>Fiction (Historical)</option>
                <option value="Fiction (Thriller)" {{ old('category', $book->category) === 'Fiction (Thriller)' ? 'selected' : '' }}>Fiction (Thriller)</option>
                <option value="Fiction (Fantasy)" {{ old('category', $book->category) === 'Fiction (Fantasy)' ? 'selected' : '' }}>Fiction (Fantasy)</option>
                <option value="Fiction (Mystery)" {{ old('category', $book->category) === 'Fiction (Mystery)' ? 'selected' : '' }}>Fiction (Mystery)</option>
                <option value="Fiction (Supernatural Thriller)" {{ old('category', $book->category) === 'Fiction (Supernatural Thriller)' ? 'selected' : '' }}>Fiction (Supernatural Thriller)</option>
                <option value="Fiction (Adventure)" {{ old('category', $book->category) === 'Fiction (Adventure)' ? 'selected' : '' }}>Fiction (Adventure)</option>
                <option value="Fiction (Dystopian)" {{ old('category', $book->category) === 'Fiction (Dystopian)' ? 'selected' : '' }}>Fiction (Dystopian)</option>
                <option value="Fiction (Literary Fiction)" {{ old('category', $book->category) === 'Fiction (Literary Fiction)' ? 'selected' : '' }}>Fiction (Literary Fiction)</option>
                <option value="Fiction (Short Stories)" {{ old('category', $book->category) === 'Fiction (Short Stories)' ? 'selected' : '' }}>Fiction (Short Stories)</option>
            </select><br><br>
            
            <label for="shelf_number">Shelf Number:</label><br>
            <select id="shelf_number" name="shelf_number" required>
                <option value="">Select a shelf number</option>
                <option value="ARB-FIC-GEN-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-GEN-001' ? 'selected' : '' }}>ARB-FIC-GEN-001</option>
                <option value="ARB-FIC-GEN-002" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-GEN-002' ? 'selected' : '' }}>ARB-FIC-GEN-002</option>
                <option value="ARB-FIC-GEN-003" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-GEN-003' ? 'selected' : '' }}>ARB-FIC-GEN-003</option>
                <option value="ARB-FIC-ROM-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-ROM-001' ? 'selected' : '' }}>ARB-FIC-ROM-001</option>
                <option value="ARB-FIC-SCI-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SCI-001' ? 'selected' : '' }}>ARB-FIC-SCI-001</option>
                <option value="ARB-FIC-HIS-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-HIS-001' ? 'selected' : '' }}>ARB-FIC-HIS-001</option>
                <option value="ARB-FIC-THR-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-THR-001' ? 'selected' : '' }}>ARB-FIC-THR-001</option>
                <option value="ARB-FIC-FAN-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-FAN-001' ? 'selected' : '' }}>ARB-FIC-FAN-001</option>
                <option value="ARB-FIC-MYS-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-MYS-001' ? 'selected' : '' }}>ARB-FIC-MYS-001</option>
                <option value="ARB-FIC-SUP-001" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-001' ? 'selected' : '' }}>ARB-FIC-SUP-001</option>
                <option value="ARB-FIC-SUP-002" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-002' ? 'selected' : '' }}>ARB-FIC-SUP-002</option>
                <option value="ARB-FIC-SUP-003" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-003' ? 'selected' : '' }}>ARB-FIC-SUP-003</option>
                <option value="ARB-FIC-SUP-004" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-004' ? 'selected' : '' }}>ARB-FIC-SUP-004</option>
                <option value="ARB-FIC-SUP-005" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-005' ? 'selected' : '' }}>ARB-FIC-SUP-005</option>
                <option value="ARB-FIC-SUP-006" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-006' ? 'selected' : '' }}>ARB-FIC-SUP-006</option>
                <option value="ARB-FIC-SUP-007" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-007' ? 'selected' : '' }}>ARB-FIC-SUP-007</option>
                <option value="ARB-FIC-SUP-008" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-008' ? 'selected' : '' }}>ARB-FIC-SUP-008</option>
                <option value="ARB-FIC-SUP-009" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-009' ? 'selected' : '' }}>ARB-FIC-SUP-009</option>
                <option value="ARB-FIC-SUP-010" {{ old('shelf_number', $book->shelf_number) === 'ARB-FIC-SUP-010' ? 'selected' : '' }}>ARB-FIC-SUP-010</option>
            </select><br><br>
            
              
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100" value="{{ old('quantity', $book->quantity) }}" required>
            </div>

            <!-- These fields are hidden and managed by the server -->
            <input type="hidden" id="created_at" name="created_at" value="{{ $book->created_at }}">
            <input type="hidden" id="updated_at" name="updated_at" value="{{ $book->updated_at }}">
            <br>
            <input type="submit" value="Save Book">
        </form>

        <br>
        <a href="{{ route('books.index') }}" class="back"> <- Back to All Books</a>
        
    </div>
</div>
@endsection
