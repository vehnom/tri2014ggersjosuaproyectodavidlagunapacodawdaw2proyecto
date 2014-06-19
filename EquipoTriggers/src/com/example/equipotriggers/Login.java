package com.example.equipotriggers;

import android.app.Activity;
import android.app.AlertDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;

public class Login extends Activity {

	private EditText et_email;
	private EditText et_password;
	private Button bt_entrar;

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.login);

		et_email = (EditText) findViewById(R.id.et_login_email);
		et_password = (EditText) findViewById(R.id.et_login_contrasena);
		bt_entrar = (Button) findViewById(R.id.bt_login_entrar);

		bt_entrar.setOnClickListener(new View.OnClickListener() {
			public void onClick(View view) {
				checkLongitud();
			}
		});
	}

	// Valida la longitud de los datos.
	private void checkLongitud() {
		if (et_email.length() == 0 || et_password.length() == 0) {
			AlertDialog.Builder alertDialogBuilderLongitud = new AlertDialog.Builder(
					this);

			alertDialogBuilderLongitud.setTitle("Datos erróneos");
			alertDialogBuilderLongitud
					.setMessage("Los campos no pueden estar vacíos.")
					.setCancelable(false)
					.setPositiveButton("Aceptar",
							new DialogInterface.OnClickListener() {
								public void onClick(DialogInterface dialog,
										int id) {
									dialog.cancel();
								}
							});

			AlertDialog alertDialogLongitud = alertDialogBuilderLongitud
					.create();
			alertDialogLongitud.show();
		} else {
			checkDatos();
		}
	}

	// Valida que los datos sean correctos.
	private void checkDatos() {
		if (Utils.esEmail(et_email.getText().toString()) == false) {
			AlertDialog.Builder alertDialogBuilderEmail = new AlertDialog.Builder(
					this);

			alertDialogBuilderEmail.setTitle("Datos erróneos");
			alertDialogBuilderEmail
					.setMessage("El email no es válido.")
					.setCancelable(false)
					.setPositiveButton("Aceptar",
							new DialogInterface.OnClickListener() {
								public void onClick(DialogInterface dialog,
										int id) {
									dialog.cancel();
								}
							});

			AlertDialog alertDialogEmail = alertDialogBuilderEmail.create();
			alertDialogEmail.show();
		} else {
			checkLogin();
		}
	}

	private void checkLogin() {
		if (et_email.getText().toString().equalsIgnoreCase("prueba@mail.com")
				&& et_password.getText().toString().equalsIgnoreCase("123456")) {
			showMap();
		} else {
			showError();
		}
	}

	private void showMap() {
		Intent i = new Intent(this, Principal.class);
		startActivity(i);
		finish();
	}

	private void showError() {
		AlertDialog.Builder alertDialogBuilderDatos = new AlertDialog.Builder(
				this);

		alertDialogBuilderDatos.setTitle("Datos erróneos");
		alertDialogBuilderDatos
				.setMessage("El email o la contraseña no son correctos.")
				.setCancelable(false)
				.setPositiveButton("Aceptar",
						new DialogInterface.OnClickListener() {
							public void onClick(DialogInterface dialog, int id) {
								dialog.cancel();
							}
						});

		AlertDialog alertDialogDatos = alertDialogBuilderDatos.create();
		alertDialogDatos.show();
	}
}
