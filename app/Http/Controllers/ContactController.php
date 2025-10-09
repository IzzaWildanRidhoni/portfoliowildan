<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::active()->get();

        return view('contact.index', compact('socialMedia'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'subject.required' => 'Subject wajib diisi',
            'subject.max' => 'Subject maksimal 255 karakter',
            'message.required' => 'Pesan wajib diisi',
            'message.max' => 'Pesan maksimal 5000 karakter',
        ]);

        if ($validator->fails()) {
            // Jika request via AJAX
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Validation failed',
                    'errors' => $validator->errors()
                ], 422);
            }

            // Jika request biasa
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Mohon periksa kembali form Anda.');
        }

        try {
            ContactMessage::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
                'status' => 'unread',
            ]);

            $successMessage = 'Terima kasih! Pesan Anda telah terkirim. Saya akan segera menghubungi Anda.';

            // Jika request via AJAX
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => true,
                    'message' => $successMessage
                ], 200);
            }

            // Jika request biasa
            return back()->with('success', $successMessage);
        } catch (\Exception $e) {
            // Log error
            \Log::error('Contact form error: ' . $e->getMessage());

            // Jika request via AJAX
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.'
                ], 500);
            }

            // Jika request biasa
            return back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }

    public function getSocialMedia()
    {
        return SocialMedia::active()->get();
    }
}
