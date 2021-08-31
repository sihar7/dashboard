<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Pltp;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class PremiumExportController extends Controller
{
    function exportPremiumTotalDaily()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Total Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tahun Ke');
        $sheet->setCellValue('H1', 'Tanggal Pembayaran');


        $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
            ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->whereDay('trn_pltp.tgl_update', date('d'))
            ->whereMonth('trn_pltp.tgl_update', date('m'))
            ->whereYear('trn_pltp.tgl_update', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele',
                'trn_pltp.nominal_premi as premi_total',
                'trn_pltp.*'
            )
            ->orderBy('trn_pltp.tgl_update', 'DESC')
            ->get();

        $cell = 2;

        foreach ($pltp as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['premi_total'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, $row['tahun_ke']);
            $sheet->setCellValue('H' . $cell, Carbon::parse($row['tgl_update'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-PREMIUMTOTAL-DAILY' . ' ' . Carbon::parse(date('D'))->isoFormat('dddd');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        ob_start();
        $writer->save('php://output');
        $file = ob_get_contents();
        $res = array(
            'filename' => $fileName,
            'type' => 'xlsx',
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($file)
        );
        ob_end_clean();

        die(json_encode($res, true));
    }


    function exportPremiumTotalWeekly()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Total Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tahun Ke');
        $sheet->setCellValue('H1', 'Tanggal Pembayaran');


        $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
            ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->where('trn_pltp.tgl_update', '<=', Carbon::today()->subDay(6))
            ->whereMonth('trn_pltp.tgl_update', date('m'))
            ->whereYear('trn_pltp.tgl_update', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele',
                'trn_pltp.nominal_premi as premi_total',
                'trn_pltp.*'
            )
            ->orderBy('trn_pltp.tgl_update', 'DESC')
            ->get();

        $cell = 2;

        foreach ($pltp as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['premi_total'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, $row['tahun_ke']);
            $sheet->setCellValue('H' . $cell, Carbon::parse($row['tgl_update'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-PREMIUMTOTAL-WEEKLY' . ' ' . Carbon::parse(date('D'))->isoFormat('dddd');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        ob_start();
        $writer->save('php://output');
        $file = ob_get_contents();
        $res = array(
            'filename' => $fileName,
            'type' => 'xlsx',
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($file)
        );
        ob_end_clean();

        die(json_encode($res, true));
    }


    function exportPremiumTotalMonthly()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Total Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tahun Ke');
        $sheet->setCellValue('H1', 'Tanggal Pembayaran');


        $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
            ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->whereMonth('trn_pltp.tgl_update', date('m'))
            ->whereYear('trn_pltp.tgl_update', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele',
                'trn_pltp.nominal_premi as premi_total',
                'trn_pltp.*'
            )
            ->orderBy('trn_pltp.tgl_update', 'DESC')
            ->get();

        $cell = 2;

        foreach ($pltp as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['premi_total'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, $row['tahun_ke']);
            $sheet->setCellValue('H' . $cell, Carbon::parse($row['tgl_update'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-PREMIUMTOTAL-MONTHLY' . ' ' . Carbon::parse(now())->isoFormat('MMMM');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        ob_start();
        $writer->save('php://output');
        $file = ob_get_contents();
        $res = array(
            'filename' => $fileName,
            'type' => 'xlsx',
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($file)
        );
        ob_end_clean();

        die(json_encode($res, true));
    }


    function exportPremiumTotalYearly()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Total Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tahun Ke');
        $sheet->setCellValue('H1', 'Tanggal Pembayaran');


        $pltp = Pltp::join('mst_spaj_submit', 'trn_pltp.id_mst_spaj', '=', 'mst_spaj_submit.id')
            ->join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->whereYear('trn_pltp.tgl_update', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele',
                'trn_pltp.nominal_premi as premi_total',
                'trn_pltp.*'
            )
            ->orderBy('trn_pltp.tgl_update', 'DESC')
            ->get();

        $cell = 2;

        foreach ($pltp as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['premi_total'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, $row['tahun_ke']);
            $sheet->setCellValue('H' . $cell, Carbon::parse($row['tgl_update'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-PREMIUMTOTAL-YEARLY' . ' ' . Carbon::parse(now())->isoFormat('Y');
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');
        ob_start();
        $writer->save('php://output');
        $file = ob_get_contents();
        $res = array(
            'filename' => $fileName,
            'type' => 'xlsx',
            'file' => "data:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet;base64," . base64_encode($file)
        );
        ob_end_clean();

        die(json_encode($res, true));
    }
}
