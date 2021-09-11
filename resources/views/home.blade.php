@extends('layouts.app')

@section('title', 'Главная страница - ' . config('app.name'))

@section('content')
<div class="container">
    <div class="row">
       <form action="{{ route('catalog') }}" class="col-md-3">
           @csrf
           @foreach( $filters as $group )
               <div class="mb-3">
                   <span class="fw-bold">
                       {{ $group->name }}
                   </span>
                   @foreach( $group->filters as $filter )
                       <div class="form-check">
                           <input name="filter[]" class="form-check-input" type="checkbox" value="{{ $filter->id }}" id="ch{{ $filter->id }}" {{ (is_array(request()->filter) && in_array($filter->id, request()->filter)) ? ' checked' : '' }}>
                           <label class="form-check-label" for="ch{{ $filter->id }}">
                               {{ $filter->name }}
                           </label>
                       </div>
                   @endforeach
               </div>
           @endforeach
               <div class="my-3">
                   <select name="sort" id="sort" class="form-select" aria-label="Default select example">
                       <option value="name" @if ( request()->sort == 'name' || !request()->has('sort') ) selected @endif>По названию</option>
                       <option value="price"@if ( request()->sort == 'price') selected @endif>По цене</option>
                   </select>
               </div>
               <div class="mb-3">
                   <select name="order" id="order" class="form-select" aria-label="Default select example">
                       <option value="asc" @if ( request()->order == 'asc' || !request()->has('order') ) selected @endif>По возрастанию</option>
                       <option value="desc" @if ( request()->order == 'desc') selected @endif>По убыванию</option>
                   </select>
               </div>

           <button type="submit" class="btn btn-success mx-auto">Фильтровать</button>
       </form>
        <div class="col-md-9">
            <div class="row">
                @forelse( $products as $product )
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <h5 class="card-header">
                                {{ Str::limit($product->name, 20) }}
                            </h5>
                            <div class="card-body">
                                <p class="card-text" style="min-height: 150px">
                                    {{ Str::limit($product->content, 150) }}
                                </p>
                                <ul style="min-height: 80px">
                                    @foreach( $product->attributes as $attribute )
                                        <li class="f-italic">{{ $attribute->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <span class="text-warning fw-bold">{{ $product->price }}</span>
                                <span class="text-dark fw-bold">{{ $product->stock }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-info fw-bold text-center">По данному критерию товаров нет</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
