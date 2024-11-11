use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PaymentHistoryController;

Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store'); // Create a new payment
Route::get('/payments/{id}', [PaymentController::class, 'show'])->name('payments.show'); // View specific payment details
Route::get('/payment-history', [PaymentHistoryController::class, 'index'])->name('payment.history'); // View payment history
Route::get('/payment-done', [PaymentController::class, 'done'])->name('payment.done'); // Payment confirmation
