use Illuminate\Support\Facades\Http;
use App\Models\SuratMasuk;

public function kirimTelegram($id)
{
    $surat = SuratMasuk::findOrFail($id);

    $token = env('TELEGRAM_BOT_TOKEN');
    $chat_id = env('TELEGRAM_CHAT_ID');

    $pesan = "
📩 *SURAT MASUK*

No Urut: {$surat->no_urut}
Tanggal: {$surat->tanggal_surat}
Nomor: {$surat->nomor_surat}
Dari: {$surat->diterima_dari}
Perihal: {$surat->perihal}
Sifat: {$surat->sifat}
Pelaksanaan: {$surat->tanggal_dan_tempat_pelaksanaan}
Diteruskan: {$surat->tanggal_diteruskan}
Kepada: {$surat->diteruskan_kepada}
Catatan: {$surat->dengan_hormat_harap}
Lampiran: {$surat->lampiran}
    ";

    Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
        'chat_id' => $chat_id,
        'text' => $pesan,
        'parse_mode' => 'Markdown'
    ]);

    return redirect()->back()->with('success', 'Surat berhasil dikirim ke Telegram');
}