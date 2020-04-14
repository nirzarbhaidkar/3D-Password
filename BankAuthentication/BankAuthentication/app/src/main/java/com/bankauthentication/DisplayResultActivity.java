package com.bankauthentication;

import android.app.ProgressDialog;
import android.content.Context;
import android.content.Intent;
import android.os.AsyncTask;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.telephony.TelephonyManager;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;
import android.widget.Toast;

import org.apache.http.NameValuePair;
import org.apache.http.message.BasicNameValuePair;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;
import java.util.Random;

public class DisplayResultActivity extends AppCompatActivity {
    private ProgressDialog pDialog;

    JSONParser jsonParser = new JSONParser();
    // url to create new product
    private static String url_qr = "http://www.proitce.com/Authentication/app/addQRDetail.php";


    // JSON Node names
    private static final String TAG_SUCCESS = "success";
    TextView resultview;
    String result;
    String imei;
    Button submitbtn;
    Button compltbn;

    SqliteController controller;
    String username;
    String rno;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_display_result);
        controller=new SqliteController(this);
        username=controller.returnUsername();

        resultview = (TextView) findViewById(R.id.resultview);


        Intent intent = getIntent();
        Bundle bundle = intent.getExtras();
        result = bundle.getString("result");
        TelephonyManager telephonyManager = (TelephonyManager)getSystemService(Context.TELEPHONY_SERVICE);
        imei=telephonyManager.getDeviceId();
        //Toast.makeText(LoginActivity.this, telephonyManager.getDeviceId(), Toast.LENGTH_SHORT).show();
       // launchActivity();

        resultview.setText("QR Scanned. Submit Data");
        Log.d("sameen",""+result);

        compltbn = (Button) findViewById(R.id.compltbn);
        compltbn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                //Intent i = new Intent(DisplayResultActivity.this, DisplayResultActivity.class);
                Toast.makeText(DisplayResultActivity.this, "Process Completed!!", Toast.LENGTH_SHORT).show();
                finish();

                //startActivity(i);
            }
        });
        submitbtn = (Button) findViewById(R.id.submitbtn);
        submitbtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Random r = new Random();
                int randomNumber  = r.nextInt(8000);
                rno= ""+randomNumber;
                //reference the textview widget

                TextView rnumber = (TextView) findViewById(R.id.rnumber);
                //display the random number to textview
                rnumber.setText(String.valueOf(randomNumber));
                submitbtn.setClickable(false);


                    new AddDeatils().execute();


            }
        });

    }
    class AddDeatils extends AsyncTask<String, String, String> {

        /**
         * Before starting background thread Show Progress Dialog
         */
        @Override
        protected void onPreExecute() {
            super.onPreExecute();
            pDialog = new ProgressDialog(DisplayResultActivity.this);
            pDialog.setMessage("Validating User.. Please Wait..");
            pDialog.setIndeterminate(false);
            pDialog.setCancelable(false);
            pDialog.show();
        }

        protected String doInBackground(String... args) {

            // Building Parameters
            List<NameValuePair> params = new ArrayList<NameValuePair>();
            params.add(new BasicNameValuePair("username", username));
            params.add(new BasicNameValuePair("result", result));
            params.add(new BasicNameValuePair("imei", imei));
            params.add(new BasicNameValuePair("rno", rno));
            Log.d("sameen",""+params);
Log.d("sameen",url_qr);
            // getting JSON Object
            // Note that create product url accepts POST method

            JSONObject json = jsonParser.makeHttpRequest(url_qr, "POST", params);

            // check log cat fro response

            Log.d("sameen", json.toString());
            //Log.d("sameen", ""+url_create_product);
            try {
                int success = json.getInt(TAG_SUCCESS);
                final String message = json.getString("message");
                if (success == 1) {

                    //controller.checkLogin(Username);
                    Handler handler = new Handler(DisplayResultActivity.this.getMainLooper());
                    handler.post(new Runnable() {
                        public void run() {
                            Toast.makeText(DisplayResultActivity.this, message, Toast.LENGTH_SHORT).show();
                        }
                    });

                   // Intent i = new Intent(DisplayResultActivity.this, ScanQRActivity.class);
                  //  startActivity(i);
                   // finish();
                }
                else {
                    Handler handler = new Handler(DisplayResultActivity.this.getMainLooper());
                    handler.post(new Runnable() {
                        public void run() {
                            Toast.makeText(DisplayResultActivity.this, message, Toast.LENGTH_LONG).show();
                        }
                    });

                }
            }
            catch (JSONException e) {
                e.printStackTrace();
            }

            return null;
        }

        /**
         * After completing background task Dismiss the progress dialog
         **/
        protected void onPostExecute(String file_url) {
            // dismiss the dialog once done
            pDialog.dismiss();
        }

    }


}