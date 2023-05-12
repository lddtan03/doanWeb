#include <iostream>
#include <fstream>
using namespace std;
void ReadFile(const char* path, int**& a, int& n)
{
	fstream file(path, ios::in);
	if (!file.is_open())
		cout << "File is not open" << endl;
	else
	{
		file >> n;
		a = new int* [2];
		for (int i = 0; i < 2; i++)
		{
			a[i] = new int[n];
			for (int j = 0; j < n; j++)
			{
				file >> a[i][j];
			}
		}
		file.close();
	}
}

void xuatmang(int** a, int n)
{
	for (int i = 0; i < 2; i++)
	{
		for (int j = 0; j < n; j++)
		{
			cout << a[i][j] << " ";
		}
		cout << endl;
	}
}

void sapxep(int** a, int n, int* id, int nhom, int sl)
{
	int m;
	for (int i = 0; i < n - 1; i++)
	{
		m = i;
		for (int j = i + 1; j < sl; j++)
		{
			if (nhom == 1)
			{
				if (a[0][id[j]] < a[0][id[m]])
				{
					m = j;
				}
				if (a[0][id[j]] == a[0][id[m]] && id[j] < id[m])
					m = j;
			}
			else if (nhom == 2)
			{
				if (a[1][id[j]] > a[1][id[m]])
				{
					m = j;
				}
				if (a[0][id[j]] == a[0][id[m]] && id[j] < id[m])
					m = j;
			}
		}
		swap(id[i], id[m]);
	}
}
void Johnson(int** a, int n)
{
	int sl = 0;
	for (int i = 0; i < n; i++)
	{
		if (a[0][i] <= a[1][i])
		{
			sl++;
		}
	}
	int *n1 = new int[sl];
	int* n2 = new int[n - sl];
	int i1 = 0, i2 = 0;
	for (int i = 0; i < n; i++)
	{
		if (a[0][i] <= a[1][i])
		{
			n1[i1] = i;
			i1++;
		}
		else
		{
			n2[i2] = i;
			i2++;
		}
	}
	sapxep(a, n, n1, 1, sl);
	sapxep(a, n, n2, 2, n-sl);
	int kq1 = 0, kq2 = 0;
	cout << "Lich  gia cong la: ";
	for (int i = 0; i < sl; i++)
	{
		/*cout << n1[i]+1 << ", ";*/
		kq1 = kq1 + a[0][n1[i]];
		kq2 = kq2 + a[1][n1[i]];
	}
	for (int i = 0; i < n-sl; i++)
	{
		/*cout << n2[i]+1 << ", ";*/
		kq1 = kq1 + a[0][n2[i]];
		kq2 = kq2 + a[1][n2[i]];
	}
	cout << endl << "Thoi gian gia cong het cong viec tren 2 may la: ";
	if (kq1 >= kq2)
	{
		cout << kq1;
	}
	else
	{
		cout << kq2;
	}
	delete[]n1, n2;
}

void main()
{
	const char* f_input = "Johnsond.txt";
	int** a;
	int n;
	ReadFile(f_input, a, n);
	/*xuatmang(a, n);*/
	cout << endl;
	Johnson(a, n);
	for (int i = 0; i < 2; i++)
	{
		delete[]a[i];
	}
	delete[]a;
}