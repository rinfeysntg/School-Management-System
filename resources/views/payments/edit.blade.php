@extends('layoutenrollmentEdit')

@section('enrollmentEdit')

@if($errors->any())
        <div id="error-messages" style="display: none;">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

<div class="glass">
    <h1 class="heading">Edit Payment</h1>
    <div class="frame">
        <form id="updateStudentForm" action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <h4>Purpose: 
                <input type="text" class="form-control" id="purpose" name="purpose" value="{{ old('purpose', $payment->purpose) }}" required>
            </h4>
            <br>

            <h4>Amount: ₱ 
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $payment->amount) }}" required>
            </h4>    
            <br>
            <h4>User: 
            <select class="searchable-dropdown form-control" id="user_id" name="user_id" required>
                    <option value="{{ $payment->user_id }}" selected>{{ $payment->user->name }}</option>
                </select>
            </h4>         
            <br>

            <div class="button-container1">
                <button type="submit" class="btn">Update Payment</button>
            </div>
        </form>
            <div class="button-container" style="float:left;">
                <a href="{{ route('payments.index') }}"><button class="btn">Return</button></a>
            </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#user_id').select2({
            ajax: {
                url: '{{ route("payments.searchUsers") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        search: params.term,
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return { id: item.id, text: item.name };
                        })
                    };
                },
            },
            placeholder: 'Search for a user',
            minimumInputLength: 1
        });
    });

    document.addEventListener('DOMContentLoaded', () => {
        const errorMessages = document.getElementById('error-messages');
        if (errorMessages) {
            let messages = '';
            errorMessages.querySelectorAll('p').forEach((error) => {
                messages += error.innerText + '\n'; 
            });
            if (messages) {
                alert(messages); 
            }
        }
    });
    
</script>

@endsection
