            /* your code */
import java.util.Scanner;

public class Msg_Encrypt
{
	public static void main( String []args )
	{
		Scanner sc = new Scanner( System.in );
		String input = sc.next();
		if(input.length() > 105 )
			System.out.print("error");
		int r=(int)Math.floor(Math.sqrt( input.length() ));
		int c=(int)Math.ceil(Math.sqrt( input.length() ));
		int temp = r * c;
		while( temp < input.length() )
		{
			r = r+1;
			temp = r * c;
			
		} 
		char [][]arr = new char[r][c];
		int i = 0;
		int row = 0,col = 0;
		while( i < input.length() )
		{
			char chr = input.charAt(i);    
  			if(col==c) {
			row++; 
			col = 0;
		        arr[row][col]=chr;
			++col;
    			}
    			else
			{
			        arr[row][col]=chr;
			        ++col;
			}
			       i++;
		}
	
		for(i=0;i<c;i++)
		{
		for(int j=0;j<r;j++)
			System.out.print(arr[j][i]);
		System.out.print(" ");
		}
	} 
}								