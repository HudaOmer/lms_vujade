@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Create Page
        </div>
        <h2>Add a New Book to the shelf</h2>
        <form action="{{ route('books.store') }}" method="POST">
            @csrf
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" required><br><br>
            
            <label for="author">Author:</label><br>
            <input type="text" id="author" name="author" required><br><br>
            
            <label for="publisher">Publisher:</label><br>
            <input type="text" id="publisher" name="publisher" required><br><br>
            
            <label for="language">Language:</label><br>
            <input type="text" id="language" name="language" required><br><br>
            
            <label for="edition">Edition:</label><br>
            <input type="text" id="edition" name="edition"><br><br>
            
            <label for="category">Category:</label><br>
            <select id="category" name="category" required>
                <option value="">Select a category</option>
                <option value="Fiction (General)">Fiction (General)</option>
                <option value="Fiction (Romance)">Fiction (Romance)</option>
                <option value="Fiction (Science Fiction)">Fiction (Science Fiction)</option>
                <option value="Fiction (Historical)">Fiction (Historical)</option>
                <option value="Fiction (Thriller)">Fiction (Thriller)</option>
                <option value="Fiction (Fantasy)">Fiction (Fantasy)</option>
                <option value="Fiction (Mystery)">Fiction (Mystery)</option>
                <option value="Fiction (Supernatural Thriller)">Fiction (Supernatural Thriller)</option>
                <option value="Fiction (Adventure)">Fiction (Adventure)</option>
                <option value="Fiction (Dystopian)">Fiction (Dystopian)</option>
                <option value="Fiction (Literary Fiction)">Fiction (Literary Fiction)</option>
                <option value="Fiction (Short Stories)">Fiction (Short Stories)</option>
            </select><br><br>
            
            <label for="shelf_number">Shelf Number:</label><br>
            <select id="shelf_number" name="shelf_number" required>
                <option value="">Select a shelf number</option>
                <option value="ARB-FIC-GEN-001">ARB-FIC-GEN-001</option>
                <option value="ARB-FIC-GEN-002">ARB-FIC-GEN-002</option>
                <option value="ARB-FIC-GEN-003">ARB-FIC-GEN-003</option>
                <option value="ARB-FIC-ROM-001">ARB-FIC-ROM-001</option>
                <option value="ARB-FIC-SCI-001">ARB-FIC-SCI-001</option>
                <option value="ARB-FIC-HIS-001">ARB-FIC-HIS-001</option>
                <option value="ARB-FIC-THR-001">ARB-FIC-THR-001</option>
                <option value="ARB-FIC-FAN-001">ARB-FIC-FAN-001</option>
                <option value="ARB-FIC-MYS-001">ARB-FIC-MYS-001</option>
                <option value="ARB-FIC-SUP-001">ARB-FIC-SUP-001</option>
                <option value="ARB-FIC-SUP-002">ARB-FIC-SUP-002</option>
                <option value="ARB-FIC-SUP-003">ARB-FIC-SUP-003</option>
                <option value="ARB-FIC-SUP-004">ARB-FIC-SUP-004</option>
                <option value="ARB-FIC-SUP-005">ARB-FIC-SUP-005</option>
                <option value="ARB-FIC-SUP-006">ARB-FIC-SUP-006</option>
                <option value="ARB-FIC-SUP-007">ARB-FIC-SUP-007</option>
                <option value="ARB-FIC-SUP-008">ARB-FIC-SUP-008</option>
                <option value="ARB-FIC-SUP-009">ARB-FIC-SUP-009</option>
                <option value="ARB-FIC-SUP-010">ARB-FIC-SUP-010</option>
            </select><br><br>
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100" value="1" required>
            </div>

            <!-- These fields are hidden and managed by the server -->
            <input type="hidden" id="created_at" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            <input type="hidden" id="updated_at" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
            
            <br>
            <input type="submit" value="Save Book">
        </form>

        <br>
        <a href="{{ route('books.index') }}" class="back"> <- back to all books</a>
        
    </div>
</div>
@endsection