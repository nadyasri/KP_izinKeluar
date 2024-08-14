@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Pending Leave Requests</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee</th>
                <th>Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($leaveRequests as $leaveRequest)
                <tr>
                    <td>{{ $leaveRequest->id }}</td>
                    <td>{{ $leaveRequest->employee->employee_name }}</td>
                    <td>{{ $leaveRequest->reason }}</td>
                    <td>
                        <form action="{{ route('leave.update', $leaveRequest->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="approved">
                            <button type="submit" class="btn btn-success">Approve</button>
                        </form>
                        <form action="{{ route('leave.update', $leaveRequest->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="rejected">
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No pending leave requests.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection