#include <iostream>
#include <fstream>
using namespace std;
void ReadFile(const char* path, int*& a, int& n)
{
	fstream file(path, ios::in);
	if (!file.is_open())
		cout << "File is not open" << endl;
	else
	{
		file >> n;
		a = new int [n];
		for (int i = 0; i < n; i++)
		{
			file >> a[i];
		}
		file.close();
	}
}

void xuatmang(int* a, int n)
{
	for (int i = 0; i < n; i++)
	{
		cout << a[i]<< " ";
	}
}

void Schedule(int* a, int n)
{
	int P1 = a[0], P2 = a[1], P3 = a[2];
	for (int i = 3; i < n; i++)
	{
		if (P1 <= P2 && P1 <= P3)
		{
			P1 = P1 + a[i];
			continue;
		}
		else if(P2 < P1 && P2 <= P3)
		{
			P2 = P2 + a[i];
			continue;
		}
		else if (P3 < P1 && P3 < P2)
		{
			P3 = P3 + a[i];
		}
	}
	int kq = P1;
	if (P2 > kq)
	{
		kq = P2;
	}
	if (P3 > kq)
	{
		kq = P3;
	}
	cout << "Vay thoi gian hoan thanh tat ca cong viec la: " << kq;
}

int main()
{
	const char* f_input = "scheduled.txt";
	int* a;
	int n;
	ReadFile(f_input, a, n);
	/*xuatmang(a, n);*/
	cout << endl;
	Schedule(a, n);
	delete[] a;
	return 0;
}