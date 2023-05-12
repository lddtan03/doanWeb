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
		a = new int* [n];
		for (int i = 0; i < n; i++)
		{
			a[i] = new int[2];
			for (int j = 0; j < 2; j++)
			{
				file >> a[i][j];
			}
		}
		file.close();
	}
}
void xuatmang(int** a, int n)
{
	for (int i = 0; i < n; i++)
	{
		for (int j = 0; j < 2; j++)
		{
			cout << a[i][j] << " ";
		}
		cout << endl;
	}
}

void merge(int** a, int top, int mid, int bot)
{
	int i = top;
	int j = mid + 1;
	int k = 0;
	int n = bot - top + 1;
	int** b = new int* [n];
	while (i <= mid && j <= bot)
	{
		if (a[i][1] <= a[j][1])
		{
			b[k] = new int[2];
			b[k][0] = a[i][0];
			b[k][1] = a[i][1];
			i++; k++;
		}
		else
		{
			b[k] = new int[2];
			b[k][0] = a[j][0];
			b[k][1] = a[j][1];
			j++; k++;
		}
	}
	while (i <= mid)
	{
		b[k] = new int[2];
		b[k][0] = a[i][0];
		b[k][1] = a[i][1];
		i++; k++;
	}
	while (j <= bot)
	{
		b[k] = new int[2];
		b[k][0] = a[j][0];
		b[k][1] = a[j][1];
		j++; k++;
	}
	i = top;
	for (k = 0; k < n; k++)
	{
		a[i][0] = b[k][0];
		a[i][1] = b[k][1];
		i++;
	}
	for (k = 0; k < n; k++)
	{
		delete[]b[k];
	}
	delete[]b;
}
void merge_sort(int** a, int top, int bot)
{
	if (top < bot)
	{
		int mid = (top + bot) / 2;
		merge_sort(a, top, mid);
		merge_sort(a, mid + 1, bot);
		merge(a, top, mid, bot);
	}
}
void sort(int** a, int n)
{
	merge_sort(a, 0, n - 1);
	/*xuatmang(a, n);*/
}

void greedy1(int** a, int n)
{
	sort(a, n);
	int kq = 1;
	/*cout << "Nhung doan thang co the chon la: (" << a[0][0] << ", " << a[0][1] << ")";*/
	int end = a[0][1];
	for (int i = 1; i < n; i++)
	{
		if (a[i][0] >= end)
		{
			end = a[i][1];
			/*cout << ", (" << a[i][0] << ", " << a[i][1] << ")";*/
			kq++;
		}
	}
	cout << endl << "Vay ta chon duoc " << kq << " doan thang";
}

void main()
{
	const char* f_input = "line4.txt";
	int** a;
	int n;
	ReadFile(f_input, a, n);
	greedy1(a, n);
	for (int i = 0; i < n; i++)
	{
		delete[]a[i];
	}
	delete[]a;
}