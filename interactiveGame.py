
import sys, os

try:
    __file__
except NameError:
    pass
else:
    libdir = os.path.abspath(os.path.join(os.path.dirname(__file__), 'lib'))
    sys.path.insert(0, libdir)

import main
main.main()