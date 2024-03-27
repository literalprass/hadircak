<?php

namespace App\Http\Controllers;

    use App\Models\Pegaw;
    use App\Models\Abs;
    use App\Models\Izin;

use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

        use Illuminate\Support\Facades\DB;
        use Illuminate\Http\Request;

class Iz extends Controller
{
    protected $dp;
    protected $jx;

    public function __construct()
    {
        $this->dp = Pegaw::join('abspgw', 'pegaw.ID', '=', 'abspgw.ID')
                    ->join('izin', 'pegaw.ID', '=', 'izin.ID')
                    ->select('pegaw.*', 'izin.*', 'abspgw.*');
    }

    public function index()
    {
        if (!session('usid')) {
            abort(404);
        }
        
        return view('izin');
    }

    function upiz(Request $rq) 
    {
        $pgw = session('usid');
        $id = $pgw->id;

        $dtstr = $rq->input('dt');
        $dtr = Carbon::parse($dtstr)->format('Y-m-d');
        $crd = Abs::where('id', $id)->where('tgl', DB::raw('CURDATE()'));
            $itng = $crd->count();
            $ac = $crd->find($id);
                $apacona = Carbon::now();
                $apalah = $apacona->setTimezone('Asia/Jakarta')->format('Y-m-d');
                // dd($ac);

        $ijen = [
            'tipe' => $rq->input('tp'),
            'tgl'=> $dtr,
            'alasan' => $rq->input('als'),
            'id' => $pgw->id
        ];

        // dd($itng,$dtr,$apalah);

        if ($itng == 1 && $dtr == $apalah) {

            Izin::create($ijen);
            Abs::where('id',$id)
                ->where('tgl', DB::raw('CURDATE()'))
                ->update(['abs_log' => $rq->input('tp')]);

            return redirect()->route('pres');

        } else {echo "goblok";dd($itng,$dtr);

            Izin::create($ijen);

        };

        echo "hello";
        dd($ijen);
    }
}
