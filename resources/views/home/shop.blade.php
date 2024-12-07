<!DOCTYPE html>
<html>
<head>
    @include('home.css')
    <style>
        input[type='search'] {
            width: 400px;
            height: 50px;
            margin: 20px;
            padding: 10px;
            border: 1px solid skyblue;
            border-radius: 5px;
        }
        select {
            width: 200px;
            height: 50px;
            margin: 20px;
            padding: 10px;
            border: 1px solid skyblue;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="hero_area">
    @include('home.header')
</div>
<div class="container" style="text-align: center; margin-bottom: 20px;">
    <form action="{{ url('search_shop') }}" method="GET">
        <input type="search" name="search" placeholder="Cari produk berdasarkan nama...">
        <select name="category" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
        <input type="submit" class="btn btn-secondary" value="Search">
    </form>
</div>
@include('home.product')
</body>
</html>
