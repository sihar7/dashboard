<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\Spaj;
use Carbon\Carbon;

class PoliceApprovedExController extends Controller
{
    function exportPoliceApprovedDaily()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Nominal Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tgl Submit');

        $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->whereYear('tgl_submit', date('Y'))
            ->whereDay('tgl_submit', date('d'))
            ->whereMonth('tgl_submit', date('m'))
            ->where('mst_spaj_submit.status_approve', 1)
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele'
            )
            ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
            ->get();

        $cell = 2;

        foreach ($spaj as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['nominal_premi'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, Carbon::parse($row['tgl_submit'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-POLICEAPPROVED-DAILY' . ' ' . Carbon::parse(date('D'))->isoFormat('dddd');
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

    function exportPoliceApprovedWeekly()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Nominal Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tgl Submit');

        $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->where('mst_spaj_submit.status_approve', 1)
            ->where('tgl_submit', '<=', Carbon::today()->subDay(6))
            ->whereMonth('tgl_submit', date('m'))
            ->whereYear('tgl_submit', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele'
            )
            ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
            ->get();


        $cell = 2;

        foreach ($spaj as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['nominal_premi'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, Carbon::parse($row['tgl_submit'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-POLICEAPPROVED-WEEKLY' . ' ' . Carbon::parse(now())->isoFormat('dddd');
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

    function exportPoliceApprovedMonthly()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Nominal Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tgl Submit');
        $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->where('mst_spaj_submit.status_approve', 1)
            ->whereMonth('tgl_submit', date('m'))
            ->whereYear('tgl_submit', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele'
            )
            ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
            ->get();

        $cell = 2;

        foreach ($spaj as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['nominal_premi'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, Carbon::parse($row['tgl_submit'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-POLICEAPPROVED-MONTHLY' . ' ' . Carbon::parse(now())->isoFormat('MMMMM');
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
    function exportPoliceApprovedYearly()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No Proposal');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Tlp');
        $sheet->setCellValue('D1', 'Produk');
        $sheet->setCellValue('E1', 'Nominal Premi');
        $sheet->setCellValue('F1', 'Telesales');
        $sheet->setCellValue('G1', 'Tgl Submit');

        $spaj = Spaj::join('mst_telemarketing', 'mst_spaj_submit.id_telemarketing', '=', 'mst_telemarketing.id')
            ->where('mst_spaj_submit.status_approve', 1)
            ->whereYear('tgl_submit', date('Y'))
            ->select(
                'mst_telemarketing.*',
                'mst_spaj_submit.*',
                'mst_telemarketing.nama as nama_tele'
            )
            ->orderBy('mst_spaj_submit.tgl_submit', 'DESC')
            ->get();

        $cell = 2;

        foreach ($spaj as $row) {
            $sheet = $spreadsheet->setActiveSheetIndex(0);
            $sheet->setCellValue('A' . $cell, $row['no_proposal']);
            $sheet->setCellValue('B' . $cell, $row['nama']);
            $sheet->setCellValue('C' . $cell, $row['tlp']);
            $sheet->setCellValue('D' . $cell, $row['produk']);
            $sheet->setCellValue('E' . $cell, 'Rp. ' . number_format($row['nominal_premi'], 0, ',', '.') . '');
            $sheet->setCellValue('F' . $cell, $row['nama_tele']);
            $sheet->setCellValue('G' . $cell, Carbon::parse($row['tgl_submit'])->isoFormat('dddd, D MMMM Y'));

            $cell++;
        }
        $writer = new Xlsx($spreadsheet);
        $fileName = 'REPORT-POLICEAPPROVED-YEARLY' . ' ' . Carbon::parse(now())->isoFormat('Y');
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
