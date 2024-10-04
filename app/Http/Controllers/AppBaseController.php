<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;


class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }
    public function show($id)
{
    // Ambil data anggaran berdasarkan ID
    $anggaran = Anggaran::find($id);

    // Cek jika data ditemukan
    if (!$anggaran) {
        abort(404, 'Anggaran tidak ditemukan');
    }

    // Tampilkan view dengan data anggaran
    return view('apbdes.anggaran', compact('anggaran'));
}

}
