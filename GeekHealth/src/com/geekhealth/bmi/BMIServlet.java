package com.geekhealth.bmi;

import java.io.*;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class BMIServlet
 */
@WebServlet(description = "A servlet to calculate BMI Index", urlPatterns = { "/bmi" })
public class BMIServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public BMIServlet() {
        super();
        // TODO Auto-generated constructor stub
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		OutputStream out = response.getOutputStream();
		
		String height = request.getParameter("height");
		String weight = request.getParameter("weight");
		
		if ((height == null) || (height.length()== 0)) {
			throw new IllegalArgumentException("Height is required");
		}
		
		if ((weight == null) || (weight.length()== 0)) {
			throw new IllegalArgumentException("weight is required");
		}
		Float heightVal= Float.valueOf(height);
		Float weightVal= Float.valueOf(weight);
		
		
		Float bmi= (weightVal/ (heightVal * heightVal)) *703;
		
		String result= "Your BMI index is: " + bmi;
		
		out.write(result.getBytes());
		
		
		
		
		
		
		
		
		
		
		

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// TODO Auto-generated method stub
		this.doGet(request, response);
	}

}
