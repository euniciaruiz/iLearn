
import sys, os

try:
    __file__
except NameError:
    pass
else:
    libdir = os.path.abspath(os.path.join(os.path.dirname(__file__), 'lib'))
    sys.path.insert(0, libdir)


assert os.path.exists(libdir), 'Cannot find the level file: %s' % (libdir)


import main
main.main()