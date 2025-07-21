@extends('layouts.form')

@section('title', isset($transaction) ? 'Edit Transaction' : 'Add Transaction')

@section('form-title', isset($transaction) ? 'Edit Transaction' : 'Add New Transaction')

@section('form-action', isset($transaction) ? "/transactions/{$transaction->id}" : '/transactions')

@section('form-method')
    @isset($transaction)
        @method('PUT')
    @endisset
@endsection

@section('form-content')
    <!-- Description -->
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <input type="text" name="description" id="description" autocomplete="off"
            class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            value="{{ old('description', $transaction->description ?? '') }}" required>
    </div>

    <!-- Amount -->
    <div>
        <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah</label>
        <div class="mt-1 relative rounded-md shadow-sm">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <span class="text-gray-500 sm:text-sm">Rp</span>
            </div>
            <input type="number" step="1000" name="amount" id="amount"
                class="focus:ring-green-500 focus:border-green-500 block w-full pl-12 pr-12 sm:text-sm border-gray-300 rounded-md"
                placeholder="0" value="{{ old('amount', $transaction->amount ?? '') }}" required>
        </div>
    </div>

    <!-- Type -->
    <div>
        <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
        <select id="type" name="type"
            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm rounded-md"
            required>
            <option value="income" {{ old('type', $transaction->type ?? '') === 'income' ? 'selected' : '' }}>Income
            </option>
            <option value="expense" {{ old('type', $transaction->type ?? '') === 'expense' ? 'selected' : '' }}>Expense
            </option>
        </select>
    </div>

    <!-- Date -->
    <div>
        <label for="transaction_date" class="block text-sm font-medium text-gray-700">Date</label>
        <input type="date" name="transaction_date" id="transaction_date"
            class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            value="{{ old('transaction_date', isset($transaction) ? $transaction->transaction_date->format('Y-m-d') : now()->format('Y-m-d')) }}"
            required>
    </div>

    <!-- Category -->
    <div>
        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
        <input type="text" name="category" id="category" list="categories"
            class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
            value="{{ old('category', $transaction->category ?? '') }}" required>
        <datalist id="categories">
            <option value="Salary">
            <option value="Freelance">
            <option value="Investment">
            <option value="Food">
            <option value="Transportation">
            <option value="Housing">
            <option value="Entertainment">
            <option value="Shopping">
            <option value="Other">
        </datalist>
    </div>
@endsection

@section('submit-button', isset($transaction) ? 'Update Transaction' : 'Add Transaction')
