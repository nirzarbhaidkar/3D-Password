package com.bankauthentication;

import android.app.Activity;
import android.content.Intent;
import android.graphics.PointF;
import android.os.Bundle;
import android.util.Log;
import android.widget.TextView;
import android.widget.Toast;

import com.dlazaro66.qrcodereaderview.QRCodeReaderView;

import java.io.FileReader;

public class ScanQRActivity extends Activity implements QRCodeReaderView.OnQRCodeReadListener {

    //String result;
    private TextView resultTextView;
    private QRCodeReaderView qrCodeReaderView;

 /*   @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == 0) {

            if (resultCode == RESULT_OK) {
                String contents = data.getStringExtra("SCAN_RESULT");
            }
            if(resultCode == RESULT_CANCELED){
                //handle cancel
            }
        }
    }*/
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scan_qr);

        qrCodeReaderView = (QRCodeReaderView) findViewById(R.id.qrdecoderview);
        resultTextView = (TextView) findViewById(R.id.resultTextView);

        qrCodeReaderView.setOnQRCodeReadListener(this);

        // Use this function to enable/disable decoding
        qrCodeReaderView.setQRDecodingEnabled(true);

        // Use this function to change the autofocus interval (default is 5 secs)
        qrCodeReaderView.setAutofocusInterval(2000L);

        // Use this function to enable/disable Torch
        qrCodeReaderView.setTorchEnabled(true);

        // Use this function to set front camera preview
        qrCodeReaderView.setFrontCamera();

        // Use this function to set back camera preview
        qrCodeReaderView.setBackCamera();


    }
    // Called when a QR is decoded
    // "text" : the text encoded in QR
    // "points" : points where QR control points are placed in View
    @Override
    public void onQRCodeRead(String text, PointF[] points) {


        resultTextView.setText(text);
           //  Toast.makeText(ScanQRActivity.this, "Results :"+resultTextView.getText(), Toast.LENGTH_SHORT).show();
                 Intent i = new Intent(ScanQRActivity.this, DisplayResultActivity.class);
                     i.putExtra("result",""+text);
                        i.addFlags(Intent.FLAG_ACTIVITY_CLEAR_TOP);
                      startActivity(i);
        finish();

        //display result in toast
       /* Toast.makeText(
                ScanQRActivity.this,
                "Results : "+ resultTextView.getText().toString(), Toast.LENGTH_SHORT).show();*/
        Log.d("sameen",""+resultTextView);
    }

    @Override
    protected void onResume() {
        super.onResume();
        qrCodeReaderView.startCamera();
    }

    @Override
    protected void onPause() {
        super.onPause();
        qrCodeReaderView.stopCamera();
    }

}