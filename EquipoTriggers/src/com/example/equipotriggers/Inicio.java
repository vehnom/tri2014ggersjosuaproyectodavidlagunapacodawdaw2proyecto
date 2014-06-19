package com.example.equipotriggers;

import java.util.Timer;
import java.util.TimerTask;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;

public class Inicio extends Activity {

	private long tiempoSplash = 3000; // 3 segundos

	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.splash);

		TimerTask task = new TimerTask() {

			@Override
			public void run() {
				Intent mainIntent = new Intent().setClass(Inicio.this,
						Login.class);
				startActivity(mainIntent);
				finish(); // La terminamos para que no se pueda volver.

			}
		};

		Timer timer = new Timer();
		timer.schedule(task, tiempoSplash); // Se ejecuta despues de 3 segundos

	}
}
